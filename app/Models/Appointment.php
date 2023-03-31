<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table  ='appointments';
    protected $fillable = [
        'register_date',
        'appointment_times_id',
        'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function appointmentTimes()
    {
        return $this->belongsTo(AppointmentTime::class,'appointment_times_id');
    }

}
