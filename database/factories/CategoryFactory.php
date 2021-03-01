<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
	$faker_ar = \Faker\Factory::create('ar_JO');
    return [
        'name_en' 		=> $faker->name,//Str::random(10),
        'name_ar'		=> $faker_ar->name,//Str::random(10),
        'image'			=> null,
        'type'			=> 2,
        'delivery_fees'	=> 10,
        'sort'			=> 0,
        'created_at'	=> \Carbon\Carbon::now(),
        'updated_at'	=> \Carbon\Carbon::now()
    ];
});
