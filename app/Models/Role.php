<?php

namespace App\Models;
use App\Models\User;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    public function user()
    {
        return $this->hasMany(User::class);
    }

}
