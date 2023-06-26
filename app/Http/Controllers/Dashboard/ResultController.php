<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResultController extends Controller
{
    //

    public function index()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $category = Category::all();
        return view('dashboard.results.index',['patients'=>$patients,'doctors'=>$doctors,'category'=>$category]);
    }

    public function data(Request $request)
    {
        $query = Result::filter($request->except('_token'))->with('patient')->with('category')->with('doctor')->whereNotNull('result');

        return DataTables::eloquent($query)
        ->editColumn('patient_id',function($query){
            return $query->patient->name;
        })
        ->editColumn('doctor_id',function($query){
            return $query->doctor->name;
        })
        ->editColumn('category_id',function($query){
            return $query->category->name;
        })
        ->addColumn('img',function($query){
            return view('dashboard.results.action',['type'=>'img','data'=>$query]);
        })
        ->editColumn('created_at',function($query){
            return Carbon::parse($query->created_at)->format('M d Y');
        })
        
        ->rawColumns(['img'])
        ->make(true);
    }
}
