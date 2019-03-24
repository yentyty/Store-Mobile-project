<?php
use Faker\Generator as Faker;
use App\Models\Promotion;
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
$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'percent' => $faker->numberBetween(10, 99),
        'slug' => str_slug($faker->numberBetween(10, 99)),
    ];
});
