<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Vendor::class, function (Faker $faker) {
	$faker_ar = \Faker\Factory::create('ar_JO');
    return [
        'name_en' 		=> $faker->name,
        'name_ar'		=> $faker_ar->name,
        'user_id'		=> function () {
                                return factory(App\Models\User::class)->create()->id;
                            },
        'services'		=> json_encode(array(1,2,3)),
        'created_at'	=> \Carbon\Carbon::now(),
        'updated_at'	=> \Carbon\Carbon::now()
    ];
});
