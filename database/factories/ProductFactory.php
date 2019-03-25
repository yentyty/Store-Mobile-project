<?php

use Faker\Generator as Faker;
use App\Models\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'factory_id' => $faker->numberBetween(1, 4),
        'promotion_id' => $faker->numberBetween(1, 4),
        'in_stock' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(8),
        'picture' => json_encode(
            [ $faker->image('public/uploads/images/products', 180, 180, 'cats', null, false),
            $faker->image('public/uploads/images/products', 180, 180, 'cats', null, false),
            $faker->image('public/uploads/images/products', 180, 180, 'cats', null, false)]),
        'body' => $faker->text,
        'color' => json_encode(['Đen', 'Trắng', 'Đỏ', 'Vàng', 'Xanh']),
        'description' => $faker->text,
        'storage' => $faker->numberBetween(32,128),
        'slug' => str_slug($faker->name),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
