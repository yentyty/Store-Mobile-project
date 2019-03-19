<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'content_image',
        'cover_image',
        'slug',
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
