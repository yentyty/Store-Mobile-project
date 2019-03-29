<?php

use App\Models\Bill;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'username' => $faker->userName,
        'address' => $faker->address,
        'email' => $faker->email,
        'phone' => $faker->ean8,
        'total' => $faker->randomFloat(3, 0, 1000),
        'note' => $faker->text,
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
