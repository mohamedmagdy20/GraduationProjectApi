<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use Exception;
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
        // 
        $data = Doctor::withTrashed()->latest();

        $result = DataTables()->eloquent($data)

        ->addColumn('action',function($data){
            return view('dashboard.doctors.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('image',function($data){
            return view('dashboard.doctors.action',['type'=>'image','data'=>$data]);
            
        })
        ->editColumn('role',function($data){
            if($data->role == 'Rt')
            {
                return 'Radiologiest';
            }else{
                return 'Neurologists';
            }
        })
        ->toJson();
        return $result;
    }

    public function store(Request $request)
    {
       

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|unique:doctors,phone',
            'role'=>'required',
        ]);


        if($request->file('image'))
        {
            $imgName = time().$request->file('image')->getClientOriginalName();
            Storage::disk('doctor')->put($imgName,file_get_contents($request->file('image')));
            $image = asset('files/doctor/'.$imgName);
        }

        $data = array_merge($request->all(),['password'=>Hash::make('123')],['image'=>$image]);
        // [$name,$email,$phone] + [password] = []


        // insert into doctors(name,email,phone,password) values(data); => true  otherwise false        
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
        // update doctors set name = $name where id = id
        $rule = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'id'=>'required',
            'role'=>'required',
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        try{

            $doctor = Doctor::find($request->id);
            // return $doctor;
            if($doctor->update($request->all()))
            {
                return response()->json([
                    'msg'=>'information Updated',
                    'status'=>true
                ], 200);
            }

        }catch(Exception $e){
            return $e;
        }
        // select from doctor where id = id
      
    }

    public function delete(Request $request)
    {

        // delete from doctor where id = id
        
        $doctor = Doctor::find($request->id);

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

    public function restore(Request $request)
    {
        $doctor = Doctor::withTrashed()->findOrFail($request->id);

        $doctor->restore();
        return response()->json(['msg'=>'Doctor Activate','status'=>true], 200);
    }
    public function forcedelete(Request $request)
    {
        $admin = Doctor::withTrashed()->findOrFail($request->id);
        $admin->forceDelete();
         return response()->json(['msg'=>'Doctor Deleted','status'=>true], 200);
    }


  

    // public function updateImage(Request $request)
    // {
    //     if($request->file('img'))
    //     {

    //         $imgName = time().$request->file('img')->getClientOriginalName();
        
    //         Storage::disk('doctor')->put($imgName, file_get_contents($request->file('img')));
            
    //         $image = asset('files/doctor/' . $imgName);

    //         // www.h.com/files/doctor/156156165a.jpg

    //     }

    // }
}
