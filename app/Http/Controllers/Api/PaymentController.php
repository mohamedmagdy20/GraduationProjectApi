<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    //

    public function getToken()
    {
        $responce = Http::post('https://accept.paymob.com/api/auth/tokens',
            [
                "api_key"=> config('app.paymodKey'),
            ]);
        // return $responce->token;
        return response()->json([
        'token'=>$responce['token'],
        'status'=>true], 200);
    }
}
