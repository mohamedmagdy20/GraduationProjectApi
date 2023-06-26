<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $patients = Patient::all();
        $method = PaymentMethod::all();
        return view('dashboard.invoices.index',['patients'=>$patients,'methods'=>$method]);
        
    }

    public function data(Request $request)
    {
        $query = Invoice::filter($request->except('_token'))->with('patient')->with('paymentMethod');
        return DataTables::eloquent($query)
        ->addColumn('name',function($query){
            return $query->patient[0]->name;
        })
        ->addColumn('method',function($query)
        {
            return $query['paymentMethod']->name;
        })
        ->toJson();
        
       
    }
}
