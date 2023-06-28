<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PaymentMethod;
use Carbon\Carbon;
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

    public function create()
    {
        $patients = Patient::all();
        $cats = Category::all();
        $payments = PaymentMethod::all();
        return view('dashboard.appointments.create',['patients'=>$patients,'payments'=>$payments,'cats'=>$cats]);
    }

    public function getAvalableTime(Request $request) 
    {
        $options = '';
        $times = Appointment::with('appointmentTimes')->where('register_date',$request->appointment_date)->pluck('appointment_times_id');
        $avaliableTimes = AppointmentTime::whereNotIn('id',$times)->get();
        foreach ($avaliableTimes as  $value) {
            // $time_to = Carbon::parse($value->time_to)->format('H:i');
            // $time_from = Carbon::parse($value->time_from)->format('H:i');
            $options.="<option value='$value->id'>$value->time_from - $value->time_to</option>";
        }
        return $options;
        
    }

    public function store(Request $request)
    {
        $code ='';
        $request->validate([
            'patient_id'=>'required',
            'register_date'=>'required|date',
            'category_id'=>'required',
            'appointment_times_id'=>'required',
            'payment_id'=>'required'
        ]);
        $price =Category::find($request->category_id)->price;

        // create invoice First //
        if($request->payment_method == '2' || $request->payment_method == '3')
        {
            $code = $request->code;
            
        }else{
            $code = 'M'.'-'.time();
        }

        $invoice =  Invoice::create([
            'code'=>$code,
            'currency'=>'EGP',
            'amount'=>$price,
            'status'=>'true',
            'date'=>$request->register_date,
            'data_message'=>'Manual',
            'payment_method_id'=>$request->payment_id
        ]);        

        $appointment = Appointment::create(array_merge($request->all(),['invoice_id'=>$invoice->id]));
        if($appointment)
        {
            return response()->json(['msg'=>'Appointment Added','status'=>true], 200);

        }else{
            return response()->json(['error'=>'Error Accure','status'=>false], 200);

        }
        
    }

    public function data(Request $request)
    {
        $data = Appointment::filter($request->except('_token'))
        ->with('patient')->with('category')
        ->with('appointmentTimes')->with('invoice')
        ->withTrashed()->latest();


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
        })
        ->addColumn('payment_method',function($data){
            return $data['invoice']->payment_method;
        })
        ->make(true);        
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
