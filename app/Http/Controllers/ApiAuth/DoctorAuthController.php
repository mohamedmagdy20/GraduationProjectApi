<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctor;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

            if($doctor->verifiyed_at == null)
            {
                return response()->json([
                    'data'=>$doctor,
                    'status'=>true,
                    'verified'=>false
                ], 200);
            }else{
                return response()->json([
                    'data'=>$doctor,
                    'status'=>true,
                    'verified'=>true
                ], 200);
                
            }
        }

    }


    public function resetSetting(Request $request)
    {
        // $request->all();
        $rule = [
            'password'=>'required',
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

        $doctor = Doctor::findOrFail(Auth::user()->id);
        $password = Hash::make($request->password);

        if($request->hasFile('img'))
        {
            $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]);

            $imgName = time().$request->file('img')->getClientOriginalName();
            Storage::disk('doctor')->put($imgName, file_get_contents($request->file('img')));
            $image = asset('files/doctor/' . $imgName);


            // Update //
            if($doctor->update(['password'=>$password,'image'=>$image,'verifiyed_at'=>Carbon::now()]))
            {
                return response()->json([
                    'msg'=>'Password and Image Updated',
                    'states'=>true
                ], 200);
            }else
            {
                return response()->json([
                    'error'=>'Error Accure',
                    'status'=>false
                ], 200);
            }
        }else
        {
              // Update //
              if($doctor->update(['password'=>$password,'image'=>$image,'verifiyed_at'=>time()]))
              {
                  return response()->json([
                      'msg'=>'Password Updated',
                      'states'=>true
                  ], 200);
              }else
              {
                  return response()->json([
                      'error'=>'Error Accure',
                      'status'=>false
                  ], 200);
              }
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
