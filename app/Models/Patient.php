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
class Patient extends Authenticatable implements TranslatableContract
{
    use HasApiTokens, HasFactory, Notifiable ,Translatable;

    public $translatedAttributes = ['name', 'address'];
    protected $table = 'patients';
    protected $gaurded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        return $this->hasMany(Result::class);
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
}
