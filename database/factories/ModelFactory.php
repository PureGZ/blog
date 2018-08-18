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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    //static $password;

    return [
        /*'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),*/


		'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('gzisa'),
        'remember_token' => str_random(10),
        'profile' = './uploads/20180818/15345629427097.jpeg',
        'intro' = str_random(100),
        'created_at' = date('Y-m-d H:i:s'),
        'updated_at' = date('Y-m-d H:i:s'),

    ];
});
