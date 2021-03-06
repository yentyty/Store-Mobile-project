<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table='promotions';
    protected $fillable = [
        'percent',
        'status',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'promotion_id', 'id');
    }
}
