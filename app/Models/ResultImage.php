<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultImage extends Model
{
    use HasFactory;
    protected $table = 'result_images';
    protected $fillable = [
        'image',
        'result_id'
    ];
    public function result()
    {
        return $this->belongsTo(Result::class,'result_id');
    }
}
