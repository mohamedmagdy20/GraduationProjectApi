<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;
class UserAuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $rule = [
            'email'=>'required|email',
            'password'=>'required'
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails())
        {
            return response()->json([
                'error'=>$validator->errors(),
                'status'=>false
            ], 200);
        }

        // check email and password //

        if(! Auth::attempt($request->only(['email','password']))){
           
            return response()->json([
                'error'=>"Invaild Email and Password",
                'status'=>false
            ],200);
        }
        
        // create Token //
        
        $admin = User::where('email',$request->email)->first();

        $token = $admin->createToken('admin token')->plainTextToken;

        $admin->token = $token;

        return response()->json([
            'data'=>$admin,
            'status'=>true
        ], 200);

     }

    public function logout(Request $request)
    {
        $accessToken = $request->bearerToken();
        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);
        // Revoke token
        $token->delete();
        return response()->json([
            'msg'=>'Logout Successfuly',
            'status'=>true
        ], 200);

    }
}
