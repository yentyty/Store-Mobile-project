<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table='bill_details';
    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price',
        'amount',
        'product_name',
        'product_color',
        'product_promotion',
        'product_storage',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill', 'bill_id', 'id');
    }
}
