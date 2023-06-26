<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodController extends Controller
{
    //
    protected $model;
    public function __construct(PaymentMethod $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('dashboard.payment_method.index');
    }

    public function data()
    {
        $data = $this->model->withTrashed()->latest();
        return DataTables::of($data)
        ->addColumn('actions',function($data)
        {
            return view('dashboard.payment_method.action',['type'=>'actions','data'=>$data]);
        })->make(true);
    }


    public function toggleactive(Request $request)
    {
        $data = $this->model->withTrashed()->findOrFail($request->id);
        if($data->deleted_at == null)
        {
            $data->delete();
            
            return response()->json([
                'status'=>true,
                'msg'=>'Payment Deactivate'
            ]);
        }else{
            $data->restore();
            return response()->json([
                'status'=>true,
                'msg'=>'Payment Activated'
            ]);
        }
    }

}
