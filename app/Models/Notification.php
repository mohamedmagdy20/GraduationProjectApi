<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable =[
        'message',
        'patient_id',
        'doctor_id',
        'is_readed'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }


    public function scopeFilter($query ,$params)
    {
      
        if(isset($params['is_readed']))
        {
            $query->where('is_readed',$params['is_readed']);
        }
        return $query;
    }
}
