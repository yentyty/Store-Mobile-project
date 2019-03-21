<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table='informations';
    protected $fillable = [
        'title',
        'content',
        'slug',
    ];

    protected $primaryKey = 'id';
}
