<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Result;
use App\Models\ResultImage;
use App\Utils\GoogleDrive;
use App\Utils\SendNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class ClassificationRequestController extends Controller
{
    //

    public function index()
    {

      
        return view('dashboard.classification_requests.index');
    }

    public function data()
    {
        $query = Appointment::with('category')->with('patient')->where('is_done',false)
        ->where('register_date',Carbon::today());
        
        $result = DataTables::eloquent($query)
        
        ->editColumn('category_id',function($query){
            return $query->category->name;
        })
        ->editColumn('patient_id',function($query){
            return $query->patient->name;
        })
        ->addColumn('action',function($query){
            return view('dashboard.classification_requests.action',['type'=>'action','data'=>$query]);
        })
        ->addColumn('appointment_time',function($query){
            return $query->appointmentTimes->time_from .' -  '.$query->appointmentTimes->time_to;
        })
        ->toJson();
        return $result;
    }

    public function create($id)
    {
        $data = Appointment::findOrFail($id);

        $doctors = Doctor::all();
        return view('dashboard.classification_requests.create',compact('data','doctors'));
    }

    public function makeClassification(Request $request)
    {
        // return $request->all();
        $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'img'=>'required|image',
            'result'=>'required',
            'category_id'=>'required',
            'appointment_id'=>'required'
        ]);


        // $drive = new GoogleDrive;
        // $files = $request->file('files');
        // // return $files;
        // $url = $drive->googleDriveFilePpload($request->patient_id,$files);
        // // return $url;

        // store 

        if($request->file('img'))
        {
            $imgName = time().$request->file('img')->getClientOriginalName();

            Storage::disk('results')->put($imgName, file_get_contents($request->file('img')));

            $image = asset('files/results/'.$imgName);

        }


        // Store Files in google Drive 
        $drive = new GoogleDrive;
        $files = $request->file('files');
        $url = $drive->googleDriveFilePpload($request->patient_id,$files);


        $data =  array_merge($request->all(),['img'=>$image,'files_url'=>$url]);

        $result = Result::create($data);


        if($result)
        {
            // Add Images 
            foreach($request->file('files') as $file)
            {
                $imgName = time().$request->file('img')->getClientOriginalName();
                Storage::disk('results')->put($imgName, file_get_contents($request->file('img')));    
                $image = asset('files/results/'.$imgName);
                ResultImage::create([
                    'result_id'=>$result->id,
                    'image'=>$image
                ]);
            }
            // find Doctor 
            $doctor = Doctor::findOrFail($request->doctor_id);
            $appointment  = Appointment::findOrFail($request->appointment_id);
            // send Notification to Doctor //
            try{
                
                $appointment->update([
                    'is_done'=>1
                ]);

                // send Notification
                $notificataion = new SendNotification;
                $notificataion->Send($doctor->notification_token,$doctor->name,'doc');  

            }catch(Exception $e){
                return response()->json([
                    'error'=>'Notifcation Error',
                    'status'=>false
                ], 200);
            }
           
            return response()->json([
                'msg'=>'Classficataion Added and Sent to Doctor',
                'status'=>true
            ], 200);
        }
        else
        {
            return response()->json([
                'error'=>'Error Accure',
                'status'=>false
            ], 200);
        }
    }

    
}
