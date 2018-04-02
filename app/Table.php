<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    protected $fillable = ['name', 'waiter_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function activeOrder()
    {
        return $this->hasOne('App\Order')->where('status', '1');
    }

    public function closedOrders()
    {
        return $this->hasMany('App\Order')->where('status', '0');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
