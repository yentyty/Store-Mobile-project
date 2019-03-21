<?php
use Faker\Generator as Faker;
use App\Models\Introduce;
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
$factory->define(Introduce::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->email,
        'phone' => '09716102' . $faker->numberBetween(10, 99),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
