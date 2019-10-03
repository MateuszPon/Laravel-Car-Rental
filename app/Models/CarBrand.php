<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CarBrand extends Model
{
    public $timestamps = true;

    protected $table = 'car_brand';

    public function getModels(){
        return $this->hasMany(CarModel::class,'brand_id','id');
    }

}
