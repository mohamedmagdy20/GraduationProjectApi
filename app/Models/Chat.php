<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = [
        'created_by',
        'name',
        'is_private'
    ];
    protected $gaurded = [
        'id'
    ];

    public function participants(){
        return $this->hasMany(ChatParticipant::class,'chat_id');
    }

    public function message(){
        return $this->hasMany(ChatMessage::class,'chat_id');
    }

    public function lastMessage()
    {
        return $this->hasOne(ChatMessage::class,'chat_id')->latest('updated_at');
    }

    public function scopeHasParticipant($query, int $doctorId )
    {
        return $query->whereHas('participants', function($query) use ($doctorId){
            $query->where('doctor_id',$doctorId);
        });
    }

    public function craetedBy()
    {
        return $this->belongsTo(Doctor::class,'created_by');
    }



}
