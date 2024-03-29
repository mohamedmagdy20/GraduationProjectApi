<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
    
}
