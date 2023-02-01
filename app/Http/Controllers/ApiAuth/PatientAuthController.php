<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use App\Mail\PatientEmail;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;

class PatientAuthController extends Controller
{
    //
    public function login(Request $request){
        $rule = [
            'email'=>'required|email',
            'password'=>'required'
        ];
        $validate = Validator::make($request->all(),$rule);

        // Check Validation
        if($validate->fails())
        {
            return response()->json([
                'error'=>$validate->errors(),
                'status'=>false
            ], 400);
        }

        // check if Auth
        if(! Auth::guard('patient')->attempt($request->only(['email','password'])))
        {
            return response()->json([
                'error'=>"Invaild Email and Password",
                'status'=>false
            ],401);
        }

        $patient = Patient::where('email',$request->email)->first();
        $token = $patient->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'pateint'=>$patient,
            'token'=>$token,
            'states'=>true
        ], 200);

    }

    public function Register(Request $request)
    {
        $rule = [
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'required|confirmed',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'gender'=>'required'
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 401);
        }
        $code = $this->genetrateCode();

        if($request->hasFile('img'))
        {
            $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]);

            
            if($validate_img->fails())
            {
                return response()->json(['error'=>$validate_img->errors()],401);
            }

            $imgName = time().$request->file('img')->getClientOriginalName();

            $request->file('img')->move(public_path('files/profile'),$imgName);

            $data = array_merge($validator->validated(),['img'=>$imgName,'password'=>Hash::make($request->password),'code'=>$code ]);
            $patient = Patient::create($data);
            if($patient)
            {
                Mail::to($patient->email)->send(new PatientEmail($patient->email,$code));
                return response()->json([
                    'msg'=>'Patient Registerd Check your Email for Verification code',
                    'status'=>true,
                ], 200);
            }else{
                return response()->json([
                    'msg'=>'Error Accure',
                    'status'=>false,
                ], 401);
            }
        }else{
            $patient = Patient::create(array_merge($validator->validated(),[
                'password'=>Hash::make($request->password),
                'code'=>$code
            ]));
            if($patient)
            {
                Mail::to($patient->email)->send(new PatientEmail($patient->email,$code));

                return response()->json([
                    'msg'=>'Patient Registerd Check your Email for Verification code',
                    'status'=>true,
                ], 200);
            }else{
                return response()->json([
                    'msg'=>'Error Accure',
                    'status'=>false,
                ], 401);
            }
        }

    }

    public function verifyUser(Request $request)
    {
        $patient = Patient::where('code',$request->code)->first();
        if($patient)
        {
            $time = time();
            $patient->update(['email_verified_at'=>$time]);
            return response()->json(['patient'=>$patient,'msg'=>'Account Verfied','status'=>true], 200);
        }else{
            return response()->json([
                'error'=>'Invaild Code'
            ],401 );
        }
    }

    public function resendCode(Request $request)
    {
        $rule = [
            'email'=>'email|required',
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 401);
        }

        $patient = Patient::where('email',$request->email)->first();
        if($patient)
        {
            $code = $this->genetrateCode();
            Mail::to($patient->email)->send(new PatientEmail($patient->email,$code));
            $patient->update([
                'code'=>$code
            ]);

            return response()->json([
                'msg'=>'Check your Email for Verification Code',
                'status'=>true
            ], 200);
        }else{
            
            return response()->json([
                'msg'=>'Error Accure',
                'status'=>false,
            ], 401);
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

    public function genetrateCode()
    {
        $code =  rand(10000,99999);
        return $code;
    }
}
