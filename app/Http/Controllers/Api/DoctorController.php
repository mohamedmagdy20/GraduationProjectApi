<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\DoctorEmail;
use App\Utils\CheckCode;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    //
    public function profile(Request $request)
    {
        app()->setLocale($request->header('lang'));
        $doctor = Doctor::find(Auth::user()->id);
        if($doctor)
        {
            return response()->json([
                'data'=>$doctor,
                'status'=>true
            ],200);
        }
    }

    public function editProfile(Request $request)
    {
        // return $request->all();
        $rule = [
            'name_en'=>'required',
            'name_ar'=>'required',
            'email'=>'required|email',
            'phone'=>'required'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        $doctor = Doctor::find(Auth::user()->id);
        $data_en = ['name_en'=>$request->name_en];
        $data_ar = ['name_ar'=>$request->name_ar];
        if($doctor)
        {
            if($request->hasFile('image'))
            {
                $validate_img = Validator::make($request->all(),[
                    'image'=>['image']
                ]);

                if($validate_img->fails())
                {
                    return response()->json(['error'=>$validate_img->errors()],401);
                }

                $imgName = time().$request->file('image')->getClientOriginalName();
                Storage::disk('doctor')->put($imgName, file_get_contents($request->file('image')));
                $image = asset('files/doctor' . $imgName );

                $data = array_merge($request->all(),['en'=>$data_en],['ar'=>$data_ar],['image'=>$image]);
                if($doctor->update($data))
                {
                    return response()->json([
                        'msg'=>'Profile Updated',
                        'status'=>true
                    ], 200);
                }else{
                    return response()->json([
                        'msg'=>'Error',
                        'status'=>false
                    ], 200);
                }
            }else{
                $data = array_merge($request->all(),['en'=>$data_en],['ar'=>$data_ar]);
                if($doctor->update($data))
                {
                    return response()->json([
                        'msg'=>'Profile Updated',
                        'status'=>true
                    ], 200);
                }else{
                    return response()->json([
                        'msg'=>'Error',
                        'status'=>false
                    ], 200);
                }
            }
        }
        
    }

    public function sendEmail(Request $request)
    {
        $rule = [
            'email'=>'required|email'
        ];

        $validation = Validator::make($request->all(),$rule);

        if($validation->fails())
        {
            return response()->json([
                'error'=>$validation->errors(),
                'status'=>false
            ], 200);
        }

        //check email //
        $email = Doctor::where('email',$request->email)->first();
        if($email)
        {
            //send Email 
            $code = $this->genetrateCode();
            Mail::to($email->email)->send(new DoctorEmail($email->email,$code));
            $email->update(['code'=>$code]);
            return response()->json([
                'msg'=>'Check your Email For Verification',
                'status'=>true
            ], 200);

        }else{
            return response()->json([
                'error'=>'Invaild Email',
                'status'=>false
            ], 200);
        }
        
    }

    public function CheckVerification(Request $request)
    {
        $doctor = Doctor::where('code',$request->code)->first();
        if($doctor != null)
        {
            return response()->json([
                'msg'=>'Success',
                'data'=>$doctor,
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Invaild Code',
                'status'=>false
            ], 200);
        }
    }

    public function resend(){
        $doctor =  Doctor::find(Auth::user()->id);
        $code = $this->genetrateCode();
        $doctor->update(['code'=>$code]);
        Mail::to($doctor->email)->send(new DoctorEmail($doctor->email,$code));
        return response()->json([
            'msg'=>'Check your Email',
            'status'=>true
        ], 200);
    }

    public function changePassword(Request $request)
    {
        // return $request->all();
        $rule = [
            'old_password'=>'required',
            'new_password'=>'required|confirmed'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

        $doctor = Doctor::find(Auth::user()->id);
        if($doctor)
        {
            if(Hash::check($request->old_password, $doctor->password))
            {
                $doctor->update(['password'=>Hash::make($request->new_password)]);
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
            ], 200);
        }
    }
    
    public function genetrateCode()
    {
        $code =  rand(10000,99999);
        return $code;
    }
}
