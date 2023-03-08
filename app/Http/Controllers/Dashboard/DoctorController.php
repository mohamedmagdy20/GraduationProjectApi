<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    //
    public function index()
    {
        return  Doctor::paginate(10);
    }


    public function store(Request $request)
    {
        // return "123456";
        // return $request->all();

        // Validation //
        // $data = $request->validated();
        // return $data;
        $data = array_merge($request->all(),['password'=>Hash::make($request->password)]);
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
    
    // public function show()

    public function edit(Request $request)
    {
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

    // public function uploadImage()
    // {
    // }
}
