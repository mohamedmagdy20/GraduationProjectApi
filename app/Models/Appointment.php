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
        'patient_id',
        'category_id',
        'is_done',
        'invoice_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function appointmentTimes()
    {
        return $this->belongsTo(AppointmentTime::class,'appointment_times_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
