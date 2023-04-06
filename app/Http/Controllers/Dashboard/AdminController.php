<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use DataTables;
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

    // // public function
    // public function index()
    // {
    //     $data = User::with('roles')->paginate(10);
    //     return response()->json([
    //         'data'=>$data,
    //         'status'=>true
    //     ], 200);
    // }

    // public function store(Request $request)
    // {
    //     // return $request->all();
    //     $rule =[
    //         'name'=>'required',
    //         'email'=>'required|email|unique:users,email',
    //         'password'=>'required|confirmed|min:6'
    //     ];
    //     $validator = Validator::make($request->all(),$rule);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'error'=>$validator->errors(),
    //             'status'=>false
    //         ], 200);
    //     }
    //     $data = array_merge($request->all(),['password'=>Hash::make($request->password)]);
    //     $user = User::create($data);
    //     if($user)
    //     {
    //         $user->attachRole('super_admin');
    //         return response()->json([
    //             'msg'=>'Admin Added',
    //             'status'=>true
    //         ], 200);
    //     }else{
    //         return response()->json([
    //             'error'=>'error Accure',
    //             'status'=>false
    //         ], 200);
    //     }
    // }

    // public function show($id)
    // {
    //     $user = User::with('roles')->findOrFail($id);
    //     return response()->json([
    //         'data'=>$user,
    //         'status'=>true
    //     ], 200);
    // }


    // public function delete($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return response()->json([
    //         'msg'=>'User Deleted',
    //         'status'=>true
    //     ], 200);
    // }


    // public function edit(Request $request,$id)
    // {
    //     $user = User::findOrFail($id);

    //     if($user->update($request->all()))
    //     {
    //         return response()->json([
    //             'msg'=>'Admin Updated',
    //             'status'=>true
    //         ], 200);
    //     }else{
    //         return response()->json([
    //             'error'=>'Error',
    //             'status'=>false
    //         ], 200);
    //     }
    // }

    public function index()
    {
        return view('dashboard.admins.index');
    }

    public function data(Request $request)
    {
        $data = User::query();

        // $result = DataTables()->eloquent($data)
        // ->addColumn('action',function($data){
        //     return view('dashboard.admins.action',['type'=>'action','data'=>$data]);
        // })->toJson();

    
    }
    
}
