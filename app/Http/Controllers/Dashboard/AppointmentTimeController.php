<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AppointmentTimeController extends Controller
{
    protected $viewPath = 'dashboard.appointment_times.';
    public function index()
    {
        return view($this->viewPath.'index');
    }

    public function data()
    {
        $query = AppointmentTime::withTrashed();

        return DataTables::of($query)
        ->addColumn('action',function($query){
            return view($this->viewPath.'action',['type'=>'action','data'=>$query]);
        })
        ->make(true);   
    }

    public function create()
    {
        return view($this->viewPath.'create');
    }

    public function edit($id)
    {
        $data = AppointmentTime::findOrFail($id);
        return view($this->viewPath.'edit',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_from'=>'required',
            'time_to'=>'required'
        ]);

        // store
        if(AppointmentTime::create($request->all()))
        {
            return response()->json([
                'msg'=>"Success",
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'error'=>'Error',
                'status'=>false
            ], 200);
        }
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'time_from'=>'required',
            'time_to'=>'required',
            'id'=>'required'
        ]);

        // update Appointment set name="mohamed" where id=2; 

        $data = AppointmentTime::findOrFail($request->id);
        // update Appointment set name="mohamed" where id=2; 
        $data->update($request->all());
        
        return response()->json(['msg'=>'Appointment Updated','status'=>true], 200);

    }

    public function delete(Request $request)
    {
        // DELETE FROM Appointemnt WHERE ID = ID
        $data = AppointmentTime::findOrFail($request->id);
        $data->delete();
        return response()->json(['msg'=>'AppointmentTime deativate','status'=>true], 200);
    }

    public function restore(Request $request)
    {
        $data = AppointmentTime::withTrashed()->findOrFail($request->id);
        $data->restore();
        return response()->json(['status'=>true,'msg'=>'AppointmentTime active'], 200);
    }
}
