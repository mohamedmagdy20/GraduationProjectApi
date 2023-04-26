<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Doctor;
use App\Models\TipImage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tips extends Model implements TranslatableContract
{
    use HasFactory , Translatable , SoftDeletes;
    protected $table ='tips';
    protected $fillable = [
        'doctor_id'
        ,'is_show'
    ];

    public $translatedAttributes = ['title', 'body'];
    // protected $gaurded = [];


    // one to Many RelationShip

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function tip_image()
    {
        return $this->hasMany(TipImage::class,'tip_id');
    }

    
   
}
