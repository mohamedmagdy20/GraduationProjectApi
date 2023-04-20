<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
    use LogsActivity;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'img'
    ];

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


    public function createToken(string $name, array $abilities = ['*'])
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random(200)),
            'abilities' => $abilities,
        ]);

        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        $this->setActivityCauser($activity);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $user =  auth()->user() ?? "system" ;
        return LogOptions::defaults()
        ->logAll()
        ->useLogName('Partner')
        ->setDescriptionForEvent(fn(string $eventName) => "Admin has been {$eventName} by ($user->email)");
    }

    function setActivityCauser($resource)
    {
        try {
            $resource->causer_id = auth()->user()->id;
            $resource->causer_type = "App\Models\User";
        } catch (\Exception $th) {
            //throw $th;
        }
    }
}
