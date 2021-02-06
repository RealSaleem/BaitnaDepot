<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Advertisement::class, function (Faker $faker) {
	$faker_ar = \Faker\Factory::create('ar_JO');
    return [
        'title_en' 		=> $faker->name,//Str::random(10),
        'title_ar'		=> $faker_ar->name,//Str::random(10),
        'sort'			=> 0,
        'created_at'	=> \Carbon\Carbon::now(),
        'updated_at'	=> \Carbon\Carbon::now()
    ];
});
