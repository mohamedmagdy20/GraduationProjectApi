<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table ='invoices';
    protected $fillable = [
        'currency',
        'amount',
        'status',
        'date',
        'data_message',
    ];
}

