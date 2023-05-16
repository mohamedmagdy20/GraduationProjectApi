<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Category;
use App\Models\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AppointmentController extends Controller
{
    protected $view = 'dashboard.appointments.';
    //
    public function index(Request $request)
    {
     
        $category = Category::all();
        $times = AppointmentTime::all();
        $patient = Patient::all();
        return view($this->view.'index',['category'=>$category,'times'=>$times,'patients'=>$patient]);
    }

    public function data(Request $request)
    {
        $data = Appointment::filter($request->except('_token'))
        ->with('patient')->with('category')
        ->with('appointmentTimes')->with('invoice')
        ->withTrashed();


        return DataTables::of($data)
        ->addColumn('actions',function($data){
            return view($this->view.'action',['type'=>'action','data'=>$data]);
        })->editColumn('patient_id',function($data){
            return $data->patient->name;
        })->editColumn('category_id',function($data){
            return $data->category->name;
        })
        ->editColumn('invoice_id',function($data){
            return $data->invoice->amount .' '.$data->invoice->currency; 
        })
        ->addColumn('time',function($data){
            return $data->appointmentTimes->time_from .' '.$data->appointmentTimes->time_to; 
        })->make(true);        
    }


    public function toggleActive(Request $request)
    {
        // return $request->id;
        $data = Appointment::withTrashed()->findOrFail($request->id);
        if($data->deleted_at == null){
            $data->deleted_at = time();
        }else{
            $data->deleted_at = null;
        }
        $data->save();
        return response()->json(['status'=>true]);
    }
}
