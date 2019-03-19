<?php

use App\Models\News;
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

$factory->define(News::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->text(255),
        'description' => $faker->text,
        'content' => $faker->text,
        'content_image' => $faker->image('public/uploads/images/news', 600, 600, 'cats', null, false),
        'cover_image' => $faker->image('public/uploads/images/news', 345, 345, 'cats', null, false),
        'slug' => str_slug($faker->text(255)),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
