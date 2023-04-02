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
        'category_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    
}