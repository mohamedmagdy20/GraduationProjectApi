<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Result extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'results';
    protected $fillable = [
        'patient_id',
        'result',
        'img',
        'rate', 
        'category_id',
        'notes',
        'doctor_id',
        'files_url',
    ];
    // 1 patient to many result
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    // 1 category to many result
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    // 1 doctor to many result //
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function scopFilter($query, $params)
    {
        if(isset($params['patient_id']))
        {
            $query->where('patient_id',$params['patient_id']);
        }

        if(isset($params['category_id']))
        {
            $query->where('category_id',$params['category_id']);
        }

        if(isset($params['doctor_id']))
        {
            $query->where('doctor_id',$params['doctor_id']);
        }   

        if(isset($params['dates']))
        {
            $dates = explode("-",$params['dates']);
            $start_from = Carbon::parse($dates[0]);
            $end_to = Carbon::parse($dates[1]);               
            $query->whereBetween('created_at',[$start_from,$end_to]);
        }

    }
    protected static $logEvents = ['created', 'updated', 'deleted'];
    public function getActivitylogOptions(): LogOptions
    {
        $admin =  auth()->user()->name ?? "system" ;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('Partner')
            ->setDescriptionForEvent(fn(string $eventName) => "Result has been {$eventName} by ($admin)");
    }
    
}