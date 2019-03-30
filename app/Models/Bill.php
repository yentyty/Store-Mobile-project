<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bills';
    protected $fillable = [
        'user_id',
        'total',
        'username',
        'address',
        'email',
        'phone',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function billDetails()
    {
        return $this->hasMany('App\Models\BillDetail', 'bill_id', 'id');
    }
}
