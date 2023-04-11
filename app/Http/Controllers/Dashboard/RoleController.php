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
        $role = Role::findOrFail($id);
        return view('dashboard.roles.edit',compact('data'));
    }

    // public
}
