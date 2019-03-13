<?php

use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        'password' => bcrypt('123'),
        'birthday' => $faker->date(),
        'gender' => $faker->numberBetween(1, 2),
        'phone' => '09716102' . $faker->numberBetween(10, 99),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'avatar' => $faker->image('public/uploads/images/users', 170, 170, null, false),
        'remember_token' => str_random(10),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
