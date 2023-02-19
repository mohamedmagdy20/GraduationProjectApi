<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    //
    public function profile()
    {
        app()->setLocale($requ);
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

                $imgName = time().$request->file('img')->getClientOriginalName();
                Storage::disk('doctor')->put($imgName, file_get_contents($request->file('img')));
                $image = 'public/files/doctor/'.$imgName;

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
                    ], 404);
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
                    ], 404);
                }
            }
        }
        
    }


    public function changePassword()
}
