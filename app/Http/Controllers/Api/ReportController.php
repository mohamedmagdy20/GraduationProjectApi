<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorDignose;
use App\Models\Patient;
use App\Models\Result;
use App\Utils\SendNotification;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    // Show Doctor Report To Make //
    public function index()
    {
        $data = Result::with('patient')->doesnthave('doctorDignose')->where('doctor_id',auth()->user()->id)->get();
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
    }

    public function makeReport(Request $request)
    {
        $rule = [
            'result_id'=>'required',
            'patient_id'=>'required',
            'medicine'=>'required|string',
            'description'=>'required|string',
            'notes'=>''
        ];

        $validation = Validator::make($request->all(),$rule);
        if($validation->fails())
        {
            return response()->json([
                'error'=>$validation->errors(),
                'status'=>false
            ], 200);
        }
        
        if(DoctorDignose::create($request->all()))
        {
            return response()->json([
                'msg'=>'Report Added',
                'status'=>true
            ], 200);

            $patient  = Patient::findOrFail($request->patient_id);
       
            // Send Notification 
            $notification = new SendNotification($patient->notification_token);
            $notification->Send($patient->notification_token,$patient->name,'pat');
            
        }else{
            return response()->json([
                'error'=>"Error Accure",
                'status'=>false
            ], 200);
        }

    }
}
