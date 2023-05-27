<?php

namespace App\Http\Controllers\Api;

use App\Events\AppointmentEvent;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class AppointmentController extends Controller
{
    //
    protected $model;
    protected $route;

    public function __construct(Appointment $model)
    {
        $this->model = $model;
    }

    public function chooseScan()
    {
        return response()->json(['data'=>Category::all(),'status'=>true], 200);
    }


    // public function
    public function getAvalableTime(Request $request) 
    {
        $registerdTime = [];
        // Validataion //
        $rule = [
            'appointment_date'=>'required|date',
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],400);
        }

        // Run Query to get All Avalabel Time //
        $times = Appointment::with('appointmentTimes')->where('register_date',$request->appointment_date)->get();
        // return $times;
        foreach($times as $time)
        {
            array_push($registerdTime,$time->appointmentTimes->id);
        }

        // Get Avaliable Times for This Date //
        $avaliableTimes = AppointmentTime::whereNotIn('id',$registerdTime)->get();

        return response()->json([
            'data'=>$avaliableTimes,
            'status'=>true
        ], 200);
    }

    public function reservation(Request $request)
    {
        $rules = [  
            'patient_id'=>'required',
            'appointment_times_id'=>'required',
            'register_date'=>'required',
            'url'=>'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],400);
        }
        // Create new  Invoice // 
        
        $InvoiceData = $this->getReservationResult($request->url);
       
        ////
        if(! Invoice::where('code',$InvoiceData['code'])->first())
        {
            $invoice = Invoice::create($InvoiceData);
        }else{
            return response()->json([
                'error'=>'Fail',
                'status'=>false
            ], 200);
        }
        ////
        if(Appointment::create(array_merge($request->all(),['invoice_id'=>$invoice->id])))
        {
            $patient = Patient::find($request->patient_id)->name;
    
            event(new AppointmentEvent($patient));
            return response()->json([
                'msg'=>'Success',
                'status'=>true
            ], 200);
        }else
        {
            return response()->json([
                'error'=>'Fail',
                'status'=>false
            ], 400);
        }
    }

    public function getReservationResult($Requesturl)
    {
        $url = $Requesturl;
        $queryString =  parse_url($url, PHP_URL_QUERY);

        parse_str($queryString, $params);

        $string = json_encode($params);

        $json = json_decode($string);

        $data = [
            'currency'=>$json->currency,
            'amount'=>$json->amount_cents,
            'status'=>$json->success,
            'date'=>$json->created_at,
            'data_message'=>$json->data_message,
            'code'=>$json->id
        ];

        return $data;
    
    }
}
