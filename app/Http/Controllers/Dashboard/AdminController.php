<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    // public functi
    public function index()
    {
        $data = User::paginate(10);
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
    }
}
