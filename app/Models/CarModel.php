<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CarModel extends Model
{
    public $timestamps = true;

    protected $table = 'car_model';

    public function getCars(){
        return $this->hasMany(Car::class,'model_id','id');
    }

    public function getBrand(){
        return $this->hasOne(CarBrand::class,'id','brand_id');
    }

}
