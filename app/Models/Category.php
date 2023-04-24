<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Category extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    
    protected $table = 'category';
    protected $fillable = [
        'name',
        'notes',
        'img',
        'img_name',
        'price',
        'url',
        'is_active'
    ];

    protected static $logEvents = ['created', 'updated', 'deleted'];
    public function getActivitylogOptions(): LogOptions
    {
        $admin =  auth()->user()->name ?? "system" ;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('Partner')
            ->setDescriptionForEvent(fn(string $eventName) => "Category has been {$eventName} by ($admin)");
    }
}
