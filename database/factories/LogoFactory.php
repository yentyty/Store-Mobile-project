<?php

use Faker\Generator as Faker;
use App\Models\Logo;
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

$factory->define(Logo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->image('public/uploads/images/logos', 170, 50, 'cats', null, false),
    ];
});
