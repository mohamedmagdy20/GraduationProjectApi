<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = "chat_messages";
    protected $gaurded = ['id'];
    protected $fillable =[
        'doctor_id',
        'user_id',
        'chat_id',
        'message',
        'file',
        'type'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }
}
