<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable =[
        'name',
        'factory_id',
        'promotion_id',
        'in_stock',
        'price',
        'image',
        'body',
        'color',
        'description',
        'storage',
        'slug',
    ];
    public $timestamps = true;

    public function factory()
    {
        return $this->belongsTo('App\Models\Factory', 'factory_id', 'id');
    }

    public function promotion()
    {
        return $this->belongsTo('App\Models\Promotion', 'promotion_id', 'id');
    }
}
