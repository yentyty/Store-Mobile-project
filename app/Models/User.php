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
}
