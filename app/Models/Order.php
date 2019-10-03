<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    public $timestamps = true;

    protected $table = 'orders';


    public function getCars()
    {

        return $this->belongsToMany(Car::class, 'orderCars')->withPivot('loan', 'returned');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getDiscount()
    {
        return $this->hasOne(Discount::class, 'id', 'discount_id');
    }

}
