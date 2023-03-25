<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Utils\SendNotification;
use App\Models\Notification;
class PatientController extends Controller
{
    //
    public function index(){
        $data = Patient::paginate(10);
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
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
                'msg'=>'Notiifcation Pushed'
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
