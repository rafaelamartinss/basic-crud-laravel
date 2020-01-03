<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'value' => $faker->randomFloat(4, 0, 4),
        'quantity' => $faker->randomNumber(),
        'category_id' => factory(App\Category::class)->create()->id
    ];
});
