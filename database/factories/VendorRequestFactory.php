<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\VendorRequest::class, function (Faker $faker) {
    return [
        'name' 		   => $faker->name,
        'mobile'	   => Str::random(8),
        'services'	   => json_encode(array(1,2,3)),
        'trucks'	   => null,
        'message'      => $faker->sentence,
        'status'	   => 0,
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now()
    ];
});
