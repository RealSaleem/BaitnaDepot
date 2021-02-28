<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
	$faker_ar = \Faker\Factory::create('ar_JO');
    return [
        'name_en' 		    => Str::random(10),
        'name_ar'		    => $faker_ar->name,//Str::random(10),
        'description_en' 	=> $faker->sentence,
        'description_ar'	=> $faker_ar->sentence,
        'vendor_id'         => 1,
        'price'				=> 100,
        'quantity'			=> 50,
        'delivery_fees'		=> 5,
        'created_at'	    => \Carbon\Carbon::now(),
        'updated_at'	    => \Carbon\Carbon::now()
    ];
});
