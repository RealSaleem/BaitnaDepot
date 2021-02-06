<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Truck::class, function (Faker $faker) {
	$faker_ar = \Faker\Factory::create('ar_JO');

    return [
        'name_en' 		=> $faker->word,
        'name_ar' 		=> $faker_ar->word,
        'sort' 			=> 1,
        'created_at' 	=> $faker->dateTime,
        'updated_at'	=> $faker->dateTime
    ];
});
