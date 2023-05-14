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
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Result;
use Illuminate\Support\Facades\Storage;

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
            ], 200);
        }
    }

    public function checkCode(Request $request)
    {
        $patient = Patient::where('remember_token',$request->code)->first();
        if($patient)
        {
            return response()->json(['data'=>$patient,'msg'=>'Success','status'=>true], 200);
        }else{
            return response()->json([
                'error'=>'Invaild Code'
            ],200 );
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
            ], 200);
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
                ], 200);
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
                'status'=>false
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
            ], 200);
        }
    }


    public function profile(Request $request)
    {
        app()->setLocale($request->header('lang'));
        // return Auth::user()->id;
        // return $request->header('lang');
        $patient = Patient::find(Auth::user()->id);
        // $patient = $data->translate('ar');

        // return $data;
        // $patient->translateOrDefault($request->header('lang'));
        if($patient)
        {
            return response()->json([
                'data'=>$patient,
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Not FOUND',
                'status'=>false
            ], 200);
        }

    }

    public function classifications()
    {
        $result = Result::with('category')->with('doctor')->where('patient_id',auth()->user()->id)->get();
        return response()->json([
            'data'=>$result,
            'status'=>true
        ], 200);
    }

    public function appointments()
    {
        $data = Appointment::with('appointmentTimes')->with('invoice')->with('category')->where('patient_id',auth()->user()->id)->get();
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);   
    }
    public function invoice()
    {
        //$data = Invoice::with(['patient',function($q)
        //{
          //  $q::find(auth()->user()->id);
        //}])->get();

        $data =  Invoice::all();
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);   

    }

    public function editProfile(Request $request)
    {
        $rule = [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'date_of_birth'=>'required|date',
        ];
        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        $patient = Patient::find(auth()->user()->id);

        if($request->hasFile('img'))
        {
            //validate income img

            $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]);

            
            if($validate_img->fails())
            {
                return response()->json(['error'=>$validate_img->errors()],401);
            }



            //delete current img
            if(!$patient)
            {
                 return response()->json([
                    'error'=>'Pateint not Found',
                    'status'=>false
                 ], 200);
            }else{
                $imagePath = $patient->img;
                if($imagePath == null)
                {
                    return response()->json([
                        'error'=>'No Image Found',
                        'status'=>false
                    ], 200);
                }else{
                    Storage::delete($imagePath);
                    //upload Image 

                    $imgName = time().$request->file('img')->getClientOriginalName();
                    Storage::disk('profile')->put($imgName, file_get_contents($request->file('img')));
                    // $image = 'public/files/profile/'.$imgName;
                    $image = asset('files/profile/' . $imgName);
                    
                    // Update DB
                    $data =array_merge($validator->validated(),['img'=>$image]);
                     if($patient->update($data)){
                         return response()->json(
                            ['msg'=>'Pateint Updated Sucessfuly','status'=>true]
                            , 200);
                     }else{
                        return response()->json([
                            'error'=>'Error Accure',
                            'status'=>false
                        ], 200);
                     }
                }
            }

        }else{
            $data = $validator->validated();
            if($patient->update($data)){
                return response()->json(
                   ['msg'=>'Pateint Updated Sucessfuly','status'=>true]
                   , 200);
            }else{
                return response()->json([
                    'error'=>'Error Accure',
                    'status'=>false
                ], 200);
            }
        }//end of function


        
    }

    public function changeImage(Request $request)
    {
        if($request->hasFile('img'))
        {
             //validate income i    
             $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]); 

            if($validate_img->fails())
            {
                return response()->json(['error'=>$validate_img->errors()],401);
            }
            //delete current img
            $patient = Patient::find(auth()->user()->id);
            if(!$patient)
            {
                 return response()->json([
                    'error'=>'Pateint not Found',
                    'status'=>false
                 ], 200);
            }else{
            
                $imgName = time().$request->file('img')->getClientOriginalName();
                Storage::disk('profile')->put($imgName, file_get_contents($request->file('img')));
                // $image = 'public/files/profile/'.$imgName;
                $image = asset('files/profile/' . $imgName);
                $patient->update(['img'=>$image]); 
                return response()->json(
                    ['msg'=>'Pateint Updated Sucessfuly','status'=>true]
                    , 200);
 
            }
                            
        
        }
    }
    public function genetrateCode()
    {
        $code =  rand(10000,99999);
        return $code;
    }
}
