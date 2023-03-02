<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
class PatientController extends Controller
{
    //
    public function index(){
        $data = Patient::paginate(10);
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
    }
}
