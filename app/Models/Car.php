<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Car extends Model
{
    public $timestamps = true;

    protected $fillable = [
       'equipment_id','model_id','color_id','price','year','is_free'
    ];

    protected $table = 'car_tables';

    public function getOrders(){

        return $this->belongsToMany(Order::class, 'orderCars')->withPivot('loan','returned');
    }

    public function getModel(){
        return $this->hasOne(CarModel::class,'id','model_id');
    }

    public function getEquipment(){
        return $this->hasOne(Equipment::class,'id','equipment_id');
    }

    public function getColor(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
