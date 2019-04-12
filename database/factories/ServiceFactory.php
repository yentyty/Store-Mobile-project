<?php

use Faker\Generator as Faker;
use App\Models\Service;
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

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'icon' => $faker->image('public/uploads/images/services', 66, 40, 'cats', null, false),
    ];
});
