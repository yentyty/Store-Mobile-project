<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
