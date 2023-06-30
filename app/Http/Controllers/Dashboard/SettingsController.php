<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //

    public function index()
    {
        $location = Location::first();
        return view('dashboard.settings.index',['data'=>Settings::all(),'location'=>$location]);
    }


    public function updateLocation(Request $request)
    {
        $location = Location::first();
        $location->update($request->all());
        return response()->json(['msg'=>'Location Updated','status'=>true], 200);
    }
    public function toggleRecaptcha(Request $request)
    {
        $active = $request->active;
        $data = Settings::where('key','active_recaptcha')->first();
        $data->value = $active ? false : true;
        $data->save();

        if($active)
        {
            return response()->json([
                'msg'=>'Recaptcha Active',
                'status'=>true
            ], 200);
        }else{
            return response()->json([
                'msg'=>'Recaptcha Dective',
                'status'=>true
            ], 200);
        }

    }

}
