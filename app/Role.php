<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at'];

    public static function getManagerRole()
    {
        return self::where('name', 'manager')->first();
    }

    public static function getWaiterRole()
    {
        return self::where('name', 'waiter')->first();
    }
}
