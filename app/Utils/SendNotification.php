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
        $SERVER_API_KEY = env('FCM_Key');

        $data = [
    
            "registration_ids" => [
                $token
            ],
    
            "notification" => [
    
                "title" => 'Medical Center',
    
                "body" => 'Dear Mr'.$name.
                'Hope To have Nice Day
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