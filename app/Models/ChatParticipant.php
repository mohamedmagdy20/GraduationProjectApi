<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    use HasFactory;
    protected $table = "chat_participants";
    protected $gaurded = ['id'];
    protected $fillable =  [
        'chat_id',
        'doctor_id',
        'user_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}
