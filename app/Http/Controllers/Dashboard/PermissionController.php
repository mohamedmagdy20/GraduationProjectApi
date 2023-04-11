<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
// use  Database\Seeders
class PermissionController extends Controller
{
    //

    public function edit($id){
        $data = Permission::all();
        $role = Role::findOrFail($id);
        return view('dashboard.roles.permission',compact('data','role'));
    }


    public function update(Request $request)
    {
        try
        {
            $request->validate([
                'permissions'=>'array',
                'role_id'=>'required'
            ]);
            $role = Role::findOrFail($request->role_id);
            
            $role->syncPermissions($request->permissions); 
            return response()->json(['msg'=>'Permission Added Successfuly','status'=>true], 200);
        }catch(Exception $e){
            return response()->json([
                'error'=>'Error Accure',
                'status'=>true
            ], 200);
        }
        
    }
}