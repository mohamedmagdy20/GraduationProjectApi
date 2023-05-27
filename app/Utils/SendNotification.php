<?php

namespace App\Utils;

class SendNotification
{
    // public $token ;

    // public function __construct($token)
    // {
    //     $this->$token = $token;
    // }

    public static function Send($token,$name,$type)
    {
        $message = '';
        if($type == 'doc')
        {
            $message = 'Dear '. $name .'there are new Result added in your queue would like to perform us your Notes';
        }elseif($type == 'pat')
        {
            $message = 'Dear '. $name .'We Have Send a New Result to Your Profile';
        }
        $SERVER_API_KEY = config('app.FCM_KEY');

        $data = [
    
            "registration_ids" => [
                $token
            ],
    
            "notification" => [
    
                "title" => 'Medical Brain Center',
    
                "body" =>$message ,
    
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