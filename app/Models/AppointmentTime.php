<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentTime extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'appointment_times';

    protected $fillable = [
        'time_from',
        'time_to',      
    ];

}
