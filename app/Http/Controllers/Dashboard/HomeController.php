<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        
        $patient = Patient::count();
        $doctors = Doctor::count();
        $reservations = Appointment::count();      
        return view('dashboard.index',compact('patient','doctors','reservations'));
    }


    public function amountChart()
    {
        // Invoice Amount //
        $amount = [];
        $invoices = Invoice::where('currency','EG')->get('amount');
        foreach($invoices as $invoice)
        {
            array_push($amount,$invoice->amount);
        }

        return response()->json($amount);
    }

    public function genderData()
    {
        $male = Patient::where('gender','male')->count();
        $female = Patient::where('gender','female')->count();
        return response()->json(['male'=>$male,'female'=>$female]);
    }

    public function AlzhimerData()
    {
        $mild = Result::where('result','MildDemented')->count();
        $mod = Result::where('result','ModerateDemented')->count();
        $nond = Result::where('result','NonDemented')->count();
        $verymild = Result::where('result','VeryMildDemented')->count();
        return response()->json(['mild'=>$mild,'mod'=>$mod,'nond'=>$nond,'verymild'=>$verymild]);
    }


    
    public function BrainData()
    {
        $glioma = Result::where('result','glioma')->count();
        $meningioma = Result::where('result','meningioma')->count();
        $nond = Result::where('result','notumor')->count();
        $verymild = Result::where('result','pituitary')->count();
        return response()->json(['glioma'=>$glioma,'meningioma'=>$meningioma,'nond'=>$nond,'verymild'=>$verymild]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
