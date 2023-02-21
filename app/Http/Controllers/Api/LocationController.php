<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;

class LocationController extends Controller
{

    public function index(){
        $location = Location::first();

        if($location)
        {
            return response()->json([
                'data'=>$location,
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error Accure',
                'status'=>false
            ], 200);
        }
        
    }

    public function store(Request $request){
        
        $rule = [
            'lang'=>'required',
            'lat'=>'required'
        ];

        $vaildator = Validator::make($request->all(),$rule);

        if($vaildator->fails())
        {
            return response()->json([
                'error'=>$vaildator->errors(),
                'status'=>false
            ], 200);
        }

        if(Location::creata($request->all())){
            return response()->json([
                'status'=>true,
                'msg'=>'Location Created'
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error Accure',
                'status'=>false
            ], 200);
        }
    }


}
