<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(Models\CarBrand::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
