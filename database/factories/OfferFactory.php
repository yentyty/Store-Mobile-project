<?php

use App\Models\Offer;
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

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'factory_id' => $faker->numberBetween(1, 5),
        'title' => $faker->text(255),
        'description' => $faker->text,
        'content' => $faker->text,
        'image' => $faker->image('public/uploads/images/offers', 570, 230, 'cats', null, false),
        'slug' => str_slug($faker->text(255)),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
