<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInOrder extends Model
{
    protected $table = 'products_in_order';
    protected $fillable = ['order_id', 'product_id', 'count', 'status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
