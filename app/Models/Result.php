<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
class Result extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = [
        'patient_id',
        'alzhimer_result',
        'brain_result',
        'img',
        'alzhimer_rate',
        'brain_rate',
        'create_at'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    
}