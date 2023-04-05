<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$code)
    {
        $this->email = $email;
        $this->code = $code;
        
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verifiying Code')
        ->markdown('emails.verfication',['email'=>$this->email,'code'=>$this->code]);
    }
}
