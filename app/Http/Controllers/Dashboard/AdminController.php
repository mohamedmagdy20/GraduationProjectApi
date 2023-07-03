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
use Kreait\Firebase\Messaging\CloudMessaging;
use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Laravel\Firebase\Facades\Firebase;
class AdminController extends Controller
{
    //
    public function profile()
    {
        return view('dashboard.profile.profile');
    }

    public function changePasswordView()
    {
        return view('dashboard.profile.change-password');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'password_confirmation'=>'required',
            'old_password'=>'required'
        ]);
        if($request->password != $request->password_confirmation)
        {
            return response()->json(['error'=>'New Password Not Same ... Try Again','status'=>false], 200);
        }
        if(Hash::check($request->old_password,auth()->user()->password))
        {
            $admin = User::find(auth()->user()->id);
            $admin->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json(['msg'=>'Password Changed','status'=>true], 200);
        }else
        {
            return response()->json(['error'=>'old Password Not Same','status'=>false], 200);
        }
    }

    public function editProfile(Request $request)
    {
        $rule = [
            'email'=>'required|email',
            'name'=>'required|string',
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }
        $admin = User::find(auth()->user()->id);

        if($request->hasFile('img'))
        {
            //validate income img

            $validate_img = Validator::make($request->all(),[
                'img'=>['image']
            ]);

            
            if($validate_img->fails())
            {
                return response()->json(['error'=>$validate_img->errors()],200);
            }

            if($admin->img)
            {
                unlink(asset('files/admin/'.$admin->img));
            }

            $imgName = time().$request->file('img')->getClientOriginalName();
            Storage::disk('admin')->put($imgName, file_get_contents($request->file('img')));

            if($admin->update(array_merge($request->all(),['img'=>$imgName])))
            {
                return response()->json([
                    'status'=>true,
                    'msg'=>'Profile Updated Succefully'
                ], 200);
            }
        }

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
        $data = User::withTrashed();

   
        $result = DataTables()->eloquent($data)
        ->addColumn('action',function($data){
            return view('dashboard.admins.action',['type'=>'action','data'=>$data]);
            
        })
        ->addColumn('image',function($data){
            return view('dashboard.admins.action',['type'=>'image','data'=>$data]);  
        })

        ->addColumn('role',function($data){
            return $data->roles[0]->display_name;  
        })
        ->toJson();
        return $result;

    }


    public function store(Request $request)
    {
        // return $request->all();
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
            ], 400);
        }

        // Create Notifcation Token
        // $messaging = Firebase::messaging();
        // $token = $messaging->getDeviceToken($userId);

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

    public function edit($id)
    {
        $roles = Role::all();
        $data  = User::findOrFail($id);
        return view('dashboard.admins.edit',['roles'=>$roles,'data'=>$data]);
    }

    public function update(Request $request)
    {
        $request->update([
            'name'=>'required',
            'email'=>'required|email',
            'role_id'=>'required'
        ]);

        $data = User::findOrFail($request->id);
        $data->update($request->all());
        $data->attachRole($request->role_id);
        return response()->json([
            'msg'=>'Admin Updated',
            'status'=>true
        ], 200);
    }




    public function delete(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->delete();
        // return back();
         return response()->json(['msg'=>'Admin DeActivate','status'=>true], 200);
    }


    public function forcedelete(Request $request)
    {
        $admin = User::withTrashed()->findOrFail($request->id);
        $admin->forceDelete();
         return response()->json(['msg'=>'Admin Deleted','status'=>true], 200);
    }

    

    public function restore(Request $request)
    {
        $admin = User::withTrashed()->findOrFail($request->id);
        $admin->restore();
        return response()->json(['msg'=>'Admin Activate','status'=>true], 200);
    }

}
