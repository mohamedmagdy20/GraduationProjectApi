<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTime extends Model
{
    use HasFactory;
    protected $table = 'appointment_times';

    protected $fillable = [
        'time_from',
        'time_to',      
    ];

}
