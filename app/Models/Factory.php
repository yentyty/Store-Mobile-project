<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $table='factories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
    ];
}
