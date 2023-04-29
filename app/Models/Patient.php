<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Result;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Patient extends Authenticatable implements TranslatableContract
{
    use HasApiTokens, HasFactory, Notifiable ,Translatable, SoftDeletes,LogsActivity;

    public $translatedAttributes = ['name', 'address'];

    
    protected $table = 'patients';
    
    
    
    protected $gaurded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
        'gender',
        'img',
        'phone',
        'date_of_birth',
        'email_verified_at',
        'remember_token',
        'code',
        'notification_token'
    ];


    public function result()
    {
        return $this->hasMany(Result::class,'patient_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class,'patient_id');
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class,'appointments');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $logEvents = ['deleted'];
    public function getActivitylogOptions(): LogOptions
    {
        $admin =  auth()->user()->name ?? "system" ;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('Partner')
            ->setDescriptionForEvent(fn(string $eventName) => "Doctor has been {$eventName} by ($admin)");
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function($patient) { 
            
             $patient->result()->delete();
             $patient->appointment()->delete();
             $patient->invoice()->delete();

        });

        static::restoring(function($patient){
            $patient->result()->restore();
            $patient->appointment()->restore();
            $patient->invoice()->restore();  
        });
    }
    
}
