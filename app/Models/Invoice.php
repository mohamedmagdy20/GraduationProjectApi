<?php

namespace App\Models;

use Carbon\Carbon;
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
        'code',
        'date',
        'data_message',
    ];

    public function appointment()
    {
        return $this->hasOne(Appointment::class,'invoice_id');
    }
    public function patient()
    {
        return $this->belongsToMany(Patient::class,'appointments');
    }

    public function scopeFilter($query, $params)
    {
        if(isset($params['patient_id']))
        {
            $query->whereHas('patient',function($q){
                $q->find('patient_id');
            });
        }

        if(isset($params['from']) && isset($params['to']))
        {
            $query->whereBetween('amount',[$params['from'],$params['to']]);
        }

        if(isset($params['dates']))
        {
            $dates = explode("-",$params['dates']);
            $start_from = Carbon::parse($dates[0]);
            $end_to = Carbon::parse($dates[1]);               
            $query->whereBetween('date',[$start_from,$end_to]);
        }

    }
}

