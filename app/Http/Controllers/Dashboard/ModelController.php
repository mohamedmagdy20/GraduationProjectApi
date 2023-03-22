<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ModelController extends Controller
{

    // api for Zhimer 
    // send Request image //
    public function approveZhimer(Request $request)
    {
        // return $request->all();
        // $rule =[
        //     'patient_id'=>'required',
        // ];
        // $validator = Validator::make($request->all(),$rule);
        // if($validator->fails())
        // {
        //     return response()->json([
        //         'error'=>$validator->fails(),
        //         'status'=>false
        //     ], 200);
        // }
        //validate income img
        $validate_img = Validator::make($request->all(),[
            'image'=>['image']
        ]);
        if($validate_img->fails())
        {
            return response()->json(['error'=>$validate_img->errors()],401);
        }

            // Call Api From Django //

            $responce = Http::withHeaders([
                'Content-Type'=> 'application/json'   
            ])->post('http://127.0.0.1:8000/alzhimer',[
                'image'=>$request->file('image')
            ]);

            return $responce;
    

        
    }
}
