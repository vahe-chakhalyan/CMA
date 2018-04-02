<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['table_id', 'total_amount', 'status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function productsInOrder()
    {
        return $this->hasMany('App\ProductInOrder');
    }
}
