<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ClassificationController extends Controller
{
    //
    public function result(Request $request)
    {
        $rule = [
            'result_id'=>'required',
            'result'=>'required',
        ];

        $validator  = Validator::make($request->all(),$rule);
        
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

        if($request->file('img'))
        {
            $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]);

            
            if($validate_img->fails())
            {
                return response()->json(['error'=>$validate_img->errors()],401);
            }

            $result = Result::findOrFail($request->result_id);
            // upload image //
            $img = time().$request->file('img')->getClientOriginalName();
            Storage::disk('result')->put($img,file_get_contents($request->file('img')));
            $imgName = asset('files/results/'.$img);

            if($result->update(array_merge($request->all(),['img'=>$imgName,'rate'=>90])))
            {
                return response()->json([
                    'msg'=>'Done',
                    'status'=>true
                ], 200);
            }else{
                
                return response()->json([
                    'msg'=>'Error',
                    'status'=>false
                ], 200);
            }

        }else{
            return response()->json([
                'msg'=>'Error',
                'status'=>false
            ], 200);

        }

    }
}
