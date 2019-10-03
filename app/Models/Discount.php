<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Discount extends Model
{
    public $timestamps = true;

    protected $table = 'discounts';

    public function getOrders()
    {
        return $this->hasMany(Order::class, 'discount_id', 'id');
    }

}
