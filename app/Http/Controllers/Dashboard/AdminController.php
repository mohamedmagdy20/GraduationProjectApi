<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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

    public function editProfile(Request $request)
    {
        $rule = [
            'email'=>'required|email',
            'name'=>'required|string'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

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
        }

        $admin = User::find(auth()->user()->id);

        // $imgName = time().$request->file('img')->getClientOriginalName();
        // Storage::disk('admin')->put($imgName, file_get_contents($request->file('img')));
        // // $image = 'public/files/profile/'.$imgName;
        // $image = asset('files/admin/' . $imgName);


        // $data = array_merge($request->all(),['img'=>$image]);

        if($admin->update($request->all()))
        {
            return response()->json([
                'status'=>true,
                'msg'=>'Profile Updated Succefully'
            ], 200);
        }
    
    }


    public function index()
    {
        return view('dashboard.admins.index');
    }

    public function create()
    {
        $role = Role::all();
        return view('dashboard.admins.create',compact('role'));
    }

    public function data(Request $request)
    {
        $data = User::query();

        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.admins.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('image',function($data){
            return view('dashboard.admins.action',['type'=>'image','data'=>$data]);
            
        })
        ->toJson();
        return $result;
    }


    public function store(Request $request)
    {
        $rule =[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6',
            'role_id'=>'required'
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
            $user->attachRole($request->role_id);
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


    public function delete(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->delete();
        // return back();
         return response()->json(['success'=>true], 200);
    }
}
