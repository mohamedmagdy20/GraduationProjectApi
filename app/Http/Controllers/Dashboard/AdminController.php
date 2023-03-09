<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function profile()
    {
        $admin = User::findOrFail(Auth::user()->id);
        if($admin)
        {
            return response()->json([
                'data'=>$admin,
                'status'=>true
            ], 200);
        }else{

            return response()->json([
                'data'=>$admin,
                'status'=>true
            ], 200);
        }
    }

    // public function
    public function index()
    {
        $data = User::with('roles')->paginate(10);
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $rule =[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6'
        ];
        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        $data = array_merge($request->all(),['password'=>Hash::make($request->password)]);
        $user = User::create($data);
        if($user)
        {
            $user->attachRole('super_admin');
            return response()->json([
                'msg'=>'Admin Added',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'error Accure',
                'status'=>false
            ], 200);
        }
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return response()->json([
            'data'=>$user,
            'status'=>true
        ], 200);
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'msg'=>'User Deleted',
            'status'=>true
        ], 200);
    }


    public function edit(Request $request,$id)
    {
        $user = User::findOrFail($id);

        if($user->update($request->all()))
        {
            return response()->json([
                'msg'=>'Admin Updated',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error',
                'status'=>false
            ], 200);
        }
    }
}
