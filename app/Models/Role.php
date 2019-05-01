<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';

    protected $fillable = [
        'name',
    ];

    public function userRoles()
    {
        return $this->hasMany('App\Models\UserRole', 'role_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User', 'user_roles', 'role_id', 'user_id');
    }
}
