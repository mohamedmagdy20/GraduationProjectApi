<?php

namespace App\Http\Controllers\Api;

use App\Events\AppointmentEvent;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

// use function PHPUnit\Framework\returnSelf;

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
            'method'=>'required',
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
            $invoice = Invoice::create(array_merge($InvoiceData,['payment_method_id'=>$request->method]));
        }else{
            return response()->json([
                'error'=>'Fail',
                'status'=>false
            ], 200);
        }
        ////
        $code = $request->patient_id.'-'.time();
        if(Appointment::create(array_merge($request->all(),['code'=>$code,'invoice_id'=>$invoice->id])))
        {
            $patient = Patient::find($request->patient_id)->name;
    
            event(new AppointmentEvent($patient));
            return response()->json([
                'msg'=>'Success',
                'code'=>$code,
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

    public function cancelPayment(Request $request)
    {
        $rule = [
            'id'=>'required',
            'date'=>'required|date'
        ];
        
        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],400);
        }

        $appointment = Appointment::findOrFail($request->id);
        $date = Carbon::parse($request->date); //20-2-20
        $registerDate = Carbon::parse($appointment->register_date); //20-2-25
        // return $appointment->invoice->o;
        if($registerDate->gt($date->addDays(1)))
        {
            $res = Http::withHeaders([
                // 'Authorization'=> 'Bearer '.config('app.PAYMOD_KEY'),
                'Content-Type'=> 'application/json'   
            ])->withBody(json_encode((object)["api_key"=>config('app.PAYMOD_KEY')]),'application/json')->post('https://accept.paymob.com/api/auth/tokens');
            // return $res['token'];

            $data = (object)[
                'auth_token'=>(string) $res['token'],
                'transaction_id'=>(int)$appointment->invoice->code,
                'amount_cents'=>(float) $appointment->invoice->amount   
            ];
            // return $data;
            // you can cencel and Call Cencel API
            $responce = Http::withHeaders([
                // 'Authorization'=> 'Bearer '.config('app.PAYMOD_KEY'),
                'Content-Type'=> 'application/json'   
            ])->withBody(json_encode($data),'application/json')->post('https://accept.paymob.com/api/acceptance/void_refund/refund');

            return $responce->body();
            if($responce->ok())
            {
                $appointment->delete();
                return response()->json([
                    'msg'=>'Appointment Cenceled',
                    'status'=>true
                ], 200);
           
            }else{
                return response()->json([
                    'error'=>'ERROR Accure',
                    'status'=>false
                ], 200);
            }

            
             }else{
            // you can not 
            return response()->json([
                'error'=>'You Can Not Cencel Appointment',
                'status'=>false
            ], 200);
        }
    }


    public function checkKosik(Request $request)
    {     
        // check payment method
        
        // get invoice code 
        // get invoice data 
        // check after 2 day from payment
        // check if pay or not
    


    }
}
