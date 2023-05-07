<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='invoices';
    protected $fillable = [
        'currency',
        'amount',
        'status',
        'date',
        'data_message',
    ];


    public function patient()
    {
        return $this->belongsToMany(Patient::class,'appointments');
    }
}

