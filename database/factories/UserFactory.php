<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gear;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'auth_id' => $faker->uuid,
        'avatar' => str_replace('https://lorempixel.com/', 'https://placekitten.com/',$faker->imageUrl(48,48)) ,
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Gear::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->userName(),
        'type' => random_int(1,5),
        'string_count' => random_int(1,12),
    ];
});
