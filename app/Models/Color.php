<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Color extends Model
{
    public $timestamps = true;


    protected $table = 'colors';

    public function getCars(){
        return $this->hasMany(Car::class,'color_id','id');
    }

}
