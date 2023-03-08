<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tips;
class TipImage extends Model
{
    use HasFactory;
    protected $table = 'tip_images';
    protected $fillable = [
        'image',
        'tip_id'
    ];

    public function tips()
    {
        return $this->belongsTo(Tips::class,'tip_id');
    }
}
