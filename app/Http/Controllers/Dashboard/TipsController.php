<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tips;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TipsController extends Controller
{
    //
    protected $viewPath = 'dashboard.tips.';
    
    
    public function index()
    {
        
        return view($this->viewPath.'index');
    }

    public function data()
    {
        $query = Tips::withTrashed();
        return DataTables::of($query)
        ->addColumn('actions',function($query)
        {
            return view($this->viewPath.'action',['data'=>$query]);
        })->make(true);
    }

}
