<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorDignose;
use App\Models\Patient;
use App\Models\Result;
use App\Utils\GoogleDrive;
use App\Utils\SendNotification;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //

    // Show Doctor Report To Make //
    public function index()
    {
        $res  =[];
        $data = Result::with('resultImages:result_id,image')->with('patient')->with('category')
        ->doesnthave('doctorDignose')
        ->whereNull('result')
        ->where('doctor_id',auth()->user()->id)->get();
        
        foreach($data as $d)
        {
            array_push($res,[
                'id'=>$d->id,
                'result'=>$d->result,
                'rate'=>$d->rate,
                'image'=>$d->img,
                'category'=>$d->category->name,
                'patient'=>$d->patient->name,
                'patient_image'=>$d->patient->img,
                'resultImages'=>$d->resultImages->img
              
            ]);
        }
        // $res = [
       //      // ];
        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);
    }

    // public function makeReport(Request $request)
    // {
    //     $rule = [
    //         'result_id'=>'required',
    //         'patient_id'=>'required',
    //         'result'=>'required',
    //         'report'=>            
    //     ];

    //     $validation = Validator::make($request->all(),$rule);
    //     if($validation->fails())
    //     {
    //         return response()->json([
    //             'error'=>$validation->errors(),
    //             'status'=>false
    //         ], 200);
    //     }
        
    //     if(DoctorDignose::create($request->all()))
    //     {
    //         return response()->json([
    //             'msg'=>'Report Added',
    //             'status'=>true
    //         ], 200);

    //         $patient  = Patient::findOrFail($request->patient_id);
       
    //         // Send Notification 
    //         $notification = new SendNotification($patient->notification_token);
    //         $notification->Send($patient->notification_token,$patient->name,'pat');
            
    //     }else{
    //         return response()->json([
    //             'error'=>"Error Accure",
    //             'status'=>false
    //         ], 200);
    //     }

    // }

    public function makeReport(Request $request)
    {
        // return $request->all();
        // return $request->images[0];
        $result = Result::findOrFail($request->result_id);
        // Get Result to uPDATE
        if($request->file('img'))
        {
            $imgName = time().$request->file('img')->getClientOriginalName();
            Storage::disk('results')->put($imgName,file_get_contents($request->file('img')));
            $img = asset('files/results/'.$imgName);
        }
        // add images to drive link //
        if($request->images)
        {
            $drive = new GoogleDrive;
            $link = $drive->googleDriveFilePpload($result->patient_id,$request->images);
        }

        if($request->file('pdf'))
        {
            $pdfName = time().$request->file('pdf')->getClientOriginalName();
            Storage::disk('rt-files')->put($pdfName,file_get_contents($request->file('pdf')));
            $pdf = asset('files/pdf/rt-files/'.$pdfName);
        }

        $result->update(array_merge($request->all(),['img'=>$img,'files_url'=>$link,'notes'=>$pdf]));

        return response()->json([
            'msg'=>'Success',
            'status'=>true
        ], 200);

    }

    public function doctorProfile()
    {
        $doctorId = auth()->user()->id;
        $data = Patient::whereHas('result', function ($query) use ($doctorId) {
            $query->whereNotNull('results.result','notes')->where('doctor_id', $doctorId);
        })
        ->with('result')
        ->get();

        return response()->json([
            'data'=>$data,
            'status'=>true
        ], 200);

    }
}