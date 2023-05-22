<?php

namespace App\Models;

use GrahamCampbell\ResultType\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorDignose extends Model
{
    use HasFactory;
    protected $table = 'doctor_dignoses';

    protected $fillable = [
        'medicine',
        'description',
        'notes',
        'result_id'
    ];

    public function result()
    {
        return $this->belongsTo(Result::class,'result_id');   
    }

    
}
