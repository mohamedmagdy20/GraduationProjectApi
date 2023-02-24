<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctor;
use Laravel\Sanctum\PersonalAccessToken;

class DoctorAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $rule = [
            'email'=>'required|email',
            'password'=>'required'
        ];

        $validator = Validator::make($request->all(),$rule);

        //check Validation of input

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

        // Check email and Password in DB //

        if(! Auth::guard('doctor')->attempt($request->only(['email','password'])))
        {
            return response()->json([
                'msg'=>'Email or Password is Not Invaild',
                'status'=>false
            ], 200);
        }
        else{
            $doctor = Doctor::where('email',$request->email)->first();
            $token = $doctor->createToken('doctorToken')->plainTextToken;
            $doctor->token = $token;

            return response()->json([
                'data'=>$doctor,
                'status'=>true
            ], 200);
        }

    }
    public function logout(Request $request)
    {
        $accessToken = $request->bearerToken();
        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);
        // Revoke token
        $token->delete();
        return response()->json([
            'msg'=>'Logout Successfuly',
            'status'=>true
        ], 200);

    }
}
