<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class LogController extends Controller
{
    //

    public function index()
    {
     
        return view('dashboard.logs.index');
    }

    public function data()
    {
        $query = Activity::all();
        return DataTables::of($query)
        ->addColumn('admin', function($query) {
            return $query->causer->email;
         })
         ->addColumn('date',function($query)
         {
            return $query->created_at->format('Y-m-d H:i:s');
         })
         ->addColumn('subject',function($query){
            return $query->subject_type;
         })
         ->make(true);
    }
}
