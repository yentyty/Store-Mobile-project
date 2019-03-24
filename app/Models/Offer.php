<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'factory_id',
        'title',
        'description',
        'content',
        'image',
        'slug',
    ];

    protected $primaryKey = 'id';

    public function factory()
    {
        return $this->belongsTo('App\Models\Factory', 'factory_id', 'id');
    }
}
