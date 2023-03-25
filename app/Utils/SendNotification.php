<?php

namespace App\Utils;

class SendNotification
{
    // public $token ;

    // public function __construct($token)
    // {
    //     $this->$token = $token;
    // }

    public static function Send($token,$name)
    {
        $SERVER_API_KEY = 'AAAABywFUoI:APA91bEoYnK-wdOBBFTShkvfnQQRTHgyg7mIsGTv2i6EvN-TSu1QLtlPE6RZ0LMePIpmXW75Vdx1oiqzPrhUT2ffH3zInfUyQ4PZG1rmWnpY2-1Lch5SVtrNqf_ZJM8uQGNVjuJ6QaRo';

        $data = [
    
            "registration_ids" => [
                $token
            ],
    
            "notification" => [
    
                "title" => 'Medical Center',
    
                "body" => 'Dear Mr '.$name.
                ' Hope To have Nice Day
                your Report Number 1 Has Been Added To your Profile With Our Best :)',
    
                "sound"=> "default" // required for sound on ios
    
            ],
    
        ];
    
        $dataString = json_encode($data);
    
        $headers = [
    
            'Authorization: key=' . $SERVER_API_KEY,
    
            'Content-Type: application/json',
    
        ];
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    
        curl_setopt($ch, CURLOPT_POST, true);
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    
        $response = curl_exec($ch);
        return $response;
    

    }
}