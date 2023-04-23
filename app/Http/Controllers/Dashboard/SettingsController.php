<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.settings.index',['data'=>Settings::all()]);
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
