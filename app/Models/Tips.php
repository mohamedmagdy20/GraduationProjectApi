<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Doctor;
use App\Models\TipImage;
class Tips extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    protected $table ='tips';
    protected $fillable = [
        'doctor_id'
    ];

    public $translatedAttributes = ['title', 'body'];
    // protected $gaurded = [];


    // one to Many RelationShip

    protected function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    protected function tip_image()
    {
        return $this->hasMany(TipImage::class);
    }

    
   
}
