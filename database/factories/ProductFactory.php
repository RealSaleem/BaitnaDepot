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
        'vendor_id'			=> function () {
                                        return factory(App\Models\Vendor::class)->create()->id;
                                }, 
        'price'				=> 100,
        'created_at'	    => \Carbon\Carbon::now(),
        'updated_at'	    => \Carbon\Carbon::now()
    ];
});
