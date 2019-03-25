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

    public function offers()
    {
        return $this->hasMany('App\Models\Offer', 'factory_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'factory_id', 'id');
    }
}
