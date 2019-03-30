<?php

use App\Models\BillDetail;
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

$factory->define(BillDetail::class, function (Faker $faker) {
    return [
        'bill_id' => $faker->numberBetween(1, 3),
        'product_id' => $faker->numberBetween(1, 3),
        'quantity' => $faker->numberBetween(1, 20),
        'price' => $faker->randomNumber(8),
        'amount' => $faker->randomNumber(8),
        'product_name' => $faker->userName,
        'product_color' => 'Đen',
        'product_promotion' => $faker->randomNumber(8),
        'product_storage' => $faker->randomNumber(8),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
