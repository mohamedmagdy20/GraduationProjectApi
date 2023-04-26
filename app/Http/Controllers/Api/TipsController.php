<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tips;
use App\Models\TipImage;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TipsController extends Controller
{
    //
    public function index()
    {
        $data = Tips::with('tip_image')->with('doctor')->paginate(10);
        return  response()->json(['data'=>$data,'status'=>true], 200);
    }

    public function show(Request $request)
    {
        $data = Tips::with('tip_image')->with('doctor')->find($request->id);
        if($data)
        {
            return response()->json([
                'data'=>$data,
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Not Found',
                'status'=>false
            ], 404);
        }
    }


    public function store(Request $request)
    {
        $rule = [
            'title_en'=>'required',
            'title_ar'=>'required',
            'body_en'=>'required',
            'body_ar'=>'required',
            'doctor_id'=>'required'
        ];

        $validator = Validator::make($request->all(), $rule);
        
        
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        $doctor_id = $request->doctor_id;
        $data_en = [
            'title'=>$request->title_en,
            'body'=>$request->body_en
        ];

        $data_ar = [
            'title'=>$request->title_ar,
            'body'=>$request->body_ar
        ];
        // Image Check  //

        if($request->hasFile('images'))
        {
            $validate_img = Validator::make($request->all(),[
                'images'=>['array']
            ]);
            // return $validate_img;
            if($validate_img->fails())
            {
              return response()->json(['error'=>$validate_img->errors()],401);
            }

            // store tips first //
            $data = array_merge($validator->validated(),['ar'=>$data_ar],['en'=>$data_en]);
            // return $request->file('images');
            $tips = Tips::create($data);

            // return $request->images;
            // store image
            try{
                foreach($request->file('images') as $img)
                {
                    $imgName = time().$img->getClientOriginalName();
                    // return $imgName;
                    Storage::disk('tips')->put($imgName, $img);
                    $imgPath = asset('files/tips' . $imgName);
                    $tipsImage =  TipImage::create(['image'=>$imgPath,'tip_id'=>$tips->id]);
                }
    
            }catch(Exception $e){
                return $e;
            }
           
            return response()->json([
                'msg'=>'Posted',
                'status'=>true
            ], 200);
        }else{

            $data = array_merge(['doctor_id'=>$doctor_id],['ar'=>$data_ar],['en'=>$data_en]);
            if($tips = Tips::create($data))
            {
                return response()->json([
                    'msg'=>'Posted',
                    'status'=>true
                ], 200);
    
            }else{
                return response()->json([
                    'error'=>'Error Accure',
                    'status'=>false 
                ], 200);
            }
        }


    }

}
