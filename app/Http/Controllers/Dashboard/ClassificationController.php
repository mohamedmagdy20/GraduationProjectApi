<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClassificationController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.classification.index');
    }

    public function data()
    {
        // select * from result inner join patient on patient.id = result.patient_id 
        // inner join doctor on doctor.id = result.doctor_id
        // inner join category on category.id = result.category_id
        
        $query = Result::with('patient')->with('doctor')->with('category');

        
        $result = DataTables::eloquent($query)
        ->addColumn('img',function($query){
            return view('dashboard.classification.action',['type'=>'img','data'=>$query]);
        })->toJson();

        return $result;
    }


    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $catgorys = Category::all();

    }
}
