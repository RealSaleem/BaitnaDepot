<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Helpers\AppConstant;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' 				=> $faker->name,
        'username' 			=> $faker->username,
        'email' 			=> $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' 			=> bcrypt('admin'),
        'type' 				=> AppConstant::APP_USER,
        'mobile' 			=> $faker->numerify('########'), //generate 8 digits number
        'status' 		    => AppConstant::ACTIVE,
        'is_approved' 		=> AppConstant::APPROVED,
        'remember_token' 	=> Str::random(10),
        'created_at'        => \Carbon\Carbon::now(),
        'updated_at'        => \Carbon\Carbon::now()
    ];
});
