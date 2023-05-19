<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table  ='appointments';
    protected $fillable = [
        'register_date',
        'appointment_times_id',
        'patient_id',
        'category_id',
        'is_done',
        'invoice_id',
        'deleted_at'
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
    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function scopeFilter($query, $params)
    {
        if ( isset($params['is_done']) == 1) {
            $query->where('is_done',true);
        }else{
            $query->where('is_done',false);
        }

        if(isset($params['dates']))
        {
            $dates = explode("-",$params['dates']);
            $start_from = Carbon::parse($dates[0]);
            $end_to = Carbon::parse($dates[1]);               
            $query->whereBetween('register_date',[$start_from,$end_to]);
        }

        if(isset($params['patient_id']))
        {
            $query->where('patient_id',$params['patient_id']);
        }

        if(isset($params['category_id']))
        {
            $query->where('category_id',$params['category_id']);
        }

        if(isset($params['time_id']))
        {
            $query->where('appointment_times_id',$params['time_id']);
        }


        return $query;
    }

}
