<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'category_id' => factory(\App\Category::class),
        'shop_id' => factory(\App\Shop::class),
        'name' => $faker->name,
        'description' => $faker->text,
        'slug' => $faker->slug,
        'image' => $faker->word,
        'price' => $faker->randomFloat(2, 0, 999999.99),
        'discount' => $faker->randomFloat(2, 0, 999999.99),
        'available' => $faker->boolean,
    ];
});
