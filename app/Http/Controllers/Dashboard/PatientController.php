<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Utils\SendNotification;
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
        return $res;
    }
}
