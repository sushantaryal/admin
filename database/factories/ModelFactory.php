<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Source\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Sushant Aryal',
        'email' => 'sushant.aryal90@gmail.com',
        'password' => bcrypt('sushant'),
        'address' => 'Kalanki, Kathmandu, Nepal',
        'remember_token' => str_random(10),
    ];
});
