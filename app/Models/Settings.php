<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Settings extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value'
    ];

    protected static $logEvents = ['created', 'updated', 'deleted'];
    public function getActivitylogOptions(): LogOptions
    {
        $admin =  auth()->user()->name ?? "system" ;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('Partner')
            ->setDescriptionForEvent(fn(string $eventName) => "Setting has been {$eventName} by ($admin)");
    }

    
}
