<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index',compact('roles'));
    }

    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('dashboard.roles.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'display_name'=>'required',
            'id'=>'required',
            'discription'=>'nullable'
        ]);

        $data = Role::findOrFail($request->id);

        $data->update($request->all());
        return response()->json(['status'=>true,'msg'=>'Role Updated'], 200);

    }
}
