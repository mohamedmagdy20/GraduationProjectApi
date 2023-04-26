<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    //
    public function index()
    {
     
        return view('dashboard.invoices.index');
        
    }

    public function data()
    {
        
        $query = Invoice::query()->with('patient');
        return DataTables::eloquent($query)
        ->addColumn('name',function($query){
            return $query->patient[0]->name;
        })
        ->toJson();
    }
}
