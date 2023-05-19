<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{
    //
    protected $model;
    public $viewPath = 'dashboard.notifications.';

    public function index()
    {
        return view($this->viewPath.'index');
    }

    public function data(Request $request)
    {
        $query = Notification::filter($request->except('_token'))->whereNotNull('doctor_id');
        return DataTables::eloquent($query)
        ->editColumn('doctor_id',function($query)
        {
            return $query->doctor->name;
        })
        ->editColumn('is_readed',function($query){
            return view($this->viewPath.'action',['type'=>'is_readed','data'=>$query]);
        })
        ->toJson();
    }

    /**
    * Noitication For Admins
    */

    // public function updateTokenUser(Request $request)
    // {
    //     $user = User::findOrFail($request->id);

    //     $user->notifcation_token = Toificatio
    // }

    
}
