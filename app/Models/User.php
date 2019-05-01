<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'username',
        'name',
        'password',
        'birthday',
        'gender',
        'phone',
        'email',
        'address',
        'avatar',
    ];

    protected $primaryKey = 'id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function userroles()
    {
        return $this->hasMany('App\Models\UserRole', 'user_id', 'id');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News', 'user_id', 'id');
    }

    public function bills()
    {
        return $this->hasMany('App\Models\Bill', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

}
