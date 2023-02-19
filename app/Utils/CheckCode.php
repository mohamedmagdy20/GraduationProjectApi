<?php
namespace App\Utils;

class checkCode 
{
    public $code ;
    public $sendCode;

    public function __construct($code, $sendCode){
        $this->code = $code;
        $this->sendCode = $sendCode;
    }

    public function CheckCode(){
        if($this->code == $this->sendCode)
        {
            return true;
        }else{
            return false;
        }
    }


}