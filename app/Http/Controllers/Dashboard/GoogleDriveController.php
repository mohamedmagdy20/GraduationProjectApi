<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Utils\GoogleDrive;
use Illuminate\Http\Request;

class GoogleDriveController extends Controller
{
    //
    public function uploadDrive($files,$id)
    {
        $patient = Patient::findOrFail($id);
        $drive = new GoogleDrive;
        $url = $drive->googleDriveFilePpload($patient->id,$files);
        return $url;  
    }
}
