<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
