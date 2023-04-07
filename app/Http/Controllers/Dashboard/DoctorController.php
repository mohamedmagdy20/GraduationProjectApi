<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.doctors.index');
    }

    public function create(){
        return view('dashboard.doctors.create');
    }

    public function edit($id)
    {
        $data = Doctor::findOrFail($id);
        return view('dashboard.doctors.edit',compact('data'));
    }

    public function data()
    {
        $data = Doctor::query();
        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.doctors.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('image',function($data){
            return view('dashboard.doctors.action',['type'=>'image','data'=>$data]);
            
        })
        ->toJson();
        return $result;
    }

    public function store(Request $request)
    {
        $rule = [
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|unique:doctors,phone'
        ];
        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->fails(),
                'status'=>false
            ], 200);
        }

        $data = array_merge($request->all(),['password'=>Hash::make('123')]);
        if(Doctor::create($data))
        {
            return response()->json([
                'msg'=>'Doctor Added',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error Occure',
                'status'=>false
            ], 200);
        }
    }


    
    public function update(Request $request)
    {

        $rule = [
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|unique:doctors,phone'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->fails(),
                'status'=>false
            ], 200);
        }

        $doctor = Doctor::find($request->id);
        // return $doctor;
        if($doctor->update($request->all()))
        {
            return response()->json([
                'msg'=>'information Updated',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error Occure',
                'status'=>false
            ], 200);
        }
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        if($doctor->delete())
        {
            return response()->json([
                'msg'=>'Deleted',
                'status'=>true
            ], 200);
        }else{
            return response()->json(
                [
                    'error'=>'Error Accure',
                    'status'=>false
                ], 200);
        }
        
    }

  

    // public function updateImage(Request $request)
    // {
    //     if($request->hasFile('img'))
    //     {
    //         $imgName = time().$request->file('img')->getClientOriginalName();
    //         Storage::disk('doctor')->put($imgName, file_get_contents($request->file('img')));
    //         $image = asset('files/doctor/' . $imgName);

    //     }

    // }
}
