<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
class PatientController extends Controller
{
    //

    public function sendEmail(Request $request)
    {
        $rule = [
            'email'=>'required|email'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>true
            ], 200);
        }
        $patient = Patient::where('email',$request->email)->first();
        if($patient)
        {
            $code = $this->genetrateCode();
            Mail::to($request->email)->send(new ResetPassword($code));
            $patient->update([
                'remember_token'=>$code
            ]);
            return response()->json([
                'msg'=>'Check your Email',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'msg'=>'Not Found',
                'status'=>false,
            ], 404);
        }
    }

    public function checkCode(Request $request)
    {
        $patient = Patient::where('remember_token',$request->code)->first();
        if($patient)
        {
            return response()->json(['patient'=>$patient,'msg'=>'Success','status'=>true], 200);
        }else{
            return response()->json([
                'error'=>'Invaild Code'
            ],401 );
        }
    }

    public function resetPassword(Request $request)
    {
        $rule = [
            'id'=>'required',
            'password'=>'required|confirmed',
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>true
            ], 200);
        }

        if($request->password != $request->password_confirmation)
        {
            return response()->json([
                'error'=>'Password Not Same',
                'status'=>false
            ], 400);
        }else{

            $patient = Patient::find($request->id);
            if($patient)
            {
                $patient->update(['password'=>Hash::make($request->password)]);
                return response()->json(['msg'=>'Password Changed','status'=>true], 200);
            }else{
                return response()->json([
                    'error'=>'Error Accure',
                    'status'=>false
                ], 404);
            }
        }

    }

    public function changePassword(Request $request)
    {
        $rule = [
            'id'=>'required',
            'old_password'=>'required',
            'new_password'=>'required|confirmed'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>true
            ], 200);
        }

        $patient = Patient::find($request->id);
        if($patient)
        {
            if(Hash::check($request->old_password, $patient->password))
            {
                $patient->update(['password'=>Hash::make($request->new_password)]);
                return response()->json(['msg'=>'Password Changed','status'=>true], 200);
          
            }else{
                return response()->json([
                    'error'=>'Old Password Not Match',
                    'status'=>false
                ], 200);
            }
        }else{
            return response()->json([
                'error'=>'Error Accure',
                'status'=>false
            ], 404);
        }
    }


    public function genetrateCode()
    {
        $code =  rand(10000,99999);
        return $code;
    }
}
