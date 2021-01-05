<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Truck::class, function (Faker $faker) {
    return [
        'name' 		=> $faker->name,
        'name_ar' 	=> $faker->name_ar,
        'sort' 		=> 1
    ];
});
