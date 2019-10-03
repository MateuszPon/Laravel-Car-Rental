<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Equipment extends Model
{
    public $timestamps = true;

    protected $table = 'equipments';


    public function getCar(){
        return $this->hasOne(Car::class,'equipment_id','id');
    }

}
