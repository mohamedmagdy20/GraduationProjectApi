<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    //
    protected $model;
    protected $route;

    public function __construct(Appointment $model)
    {
        $this->model = $model;
    }

    public function chooseScan()
    {
        return response()->json(Category::all(), 200);
    }

    public function getAvalableTime(Request $request) 
    {
        $registerdTime = [];
        // Validataion //
        $rule = [
            'appointment_date'=>'required|date',
            'category_id'=>'required'
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],400);
        }

        // Run Query to get All Avalabel Time //
        $times = Appointment::with('appointmentTimes')->where('register_date',$request->appointment_date)->get();
        // return $times;
        foreach($times as $time)
        {
            array_push($registerdTime,$time->appointmentTimes->id);
        }

        // Get Avaliable Times for This Date //
        $avaliableTimes = AppointmentTime::whereNotIn('id',$registerdTime)->get();

        return response()->json([
            'data'=>$avaliableTimes,
            'status'=>true
        ], 200);
    }

    public function reservation(Request $request)
    {
        $rules = [  
            'patient_id'=>'required',
            'appointment_times_id'=>'required',
            'register_date'=>'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],400);
        }
        
        if(Appointment::create($request->all()))
        {
            return response()->json([
                'msg'=>'Success',
                'status'=>true
            ], 200);
        }else
        {
            return response()->json([
                'error'=>'Fail',
                'status'=>false
            ], 400);
        }
    }
}
