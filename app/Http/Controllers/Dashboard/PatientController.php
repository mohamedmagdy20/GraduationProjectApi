<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Utils\SendNotification;
use App\Models\Notification;
use App\Models\Result;
use Yajra\DataTables\Facades\DataTables;

class PatientController extends Controller
{
    // //
    // public function index(){
    //     $data = Patient::paginate(10);
    //     return response()->json([
    //         'data'=>$data,
    //         'status'=>true
    //     ], 200);
    // }
    public function index()
    {
        return view('dashboard.patients.index');
    }

    public function data()
    {
        $data = Patient::withTrashed();
        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.patients.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('img',function($data){
            return view('dashboard.patients.action',['type'=>'img','data'=>$data]);
            
        })
        ->toJson();
        return $result;
    }

    public function show($id)
    {
        $data = Patient::with(['result'=>function($q){
            $q->with('category');
        }])->with(['appointment'=>function($q){
            $q->with('appointmentTimes');
        }])->with('invoice')->findOrFail($id);
        return view('dashboard.patients.show',['data'=>$data]);
    }


    // get data from patient //
    public function getResultData($id)
    {
        $data = Result::query()->with('category')->with('doctor')->where('patient_id',$id);
        return DataTables()->eloquent($data)
        ->addColumn('img',function($data){
            return view('dashboard.patients.result-action',['type'=>'img','data'=>$data]);  
        })
        ->editColumn('doctor_id',function($data){
            return $data->doctor->name;            
        })
        ->editColumn('category_id',function($data){
            return $data->category->name;
        })
        ->toJson();
    }
  


    public function getAppointmentData($id)
    {
        $data = Appointment::query()->with('appointmentTimes')->with('invoice')->where('patient_id',$id);
        return DataTables()->
        eloquent($data)
        ->addColumn('time',function($data){
            return $data->appointmentTimes->time_from .' : '.$data->appointmentTimes->time_to;
        })
        
        ->editColumn('category_id',function($data){
            return optional($data->category)->name;
        })
        ->addColumn('currency',function($data)
        {
            return $data->invoice->currency;
        })
        ->addColumn('amount',function($data){
            return $data->invoice->amount;
        })
        ->addColumn('data_message',function($data){
            return view('dashboard.patients.appointment-action',['type'=>'data_message','data'=>$data]);
        })
        ->addColumn('payment_date',function($data){
            return $data->invoice->date;
        })
        ->toJson();


    }

    public function delete(Request $request)
    {
        $data = Patient::findOrFail($request->id);
        $data->delete();
        return response()->json(['status'=>true,'msg'=>'Patient Deactive'], 200);
    }

    public function restore(Request $request)
    {
        $data = Patient::withTrashed()->find($request->id);
        $data->restore();  
        return response()->json(['status'=>true,'msg'=>'Patient active'], 200);

    }



    public function sendReport(Request $request)
    {
        $patient = Patient::first();
        $res = SendNotification::send($patient->notification_token,$patient->name);  
    
        // Store Notification in Db //
        if(Notification::create([
            'patient_id'=>$patient->id,
            'message'=>'Dear Mr '. $patient->name .
            ' Hope To have Nice Day
            your Phone Number '. $patient->phone . 'Has Been Added To your Profile With Our Best :)'
        ])){
            return response()->json([
                'msg'=>'Notification Pushed'
            ], 200);
        }
        else
        {
            return response()->json(['error'=>'Error Accure','status'=>'success'], 400);
        }
    }
    
    public function getAllNotification(Request $request)
    {
        $data = Notification::where('patient_id',$request->id)->paginate(5);
        return response()->json(
            ['data'=>$data,
            'status'=>true
        ], 200);
    }
    public function Makeseen()
    {
        $notification = Notification::findOrFail(auth()->user()->id);
        
        if($notification->update(['is_readed'=>1])){
            return response()->json(['msg'=>'Success','status'=>true], 200);
        }else{
            return response()->json([
                'error'=>'Error Occure',
                'status'=>false
            ], 200);
        }
    }

    public function unseenNotificationCount()
    {
        $notification = Notification::where('patient_id',auth()->user()->id)->where('is_readed',0)->count();
        return response()->json(['count'=>$notification,'status'=>true], 200);
    }
    
}
