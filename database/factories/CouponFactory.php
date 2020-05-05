<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat(2, 0, 999999.99),
        'start' => $faker->date(),
        'end' => $faker->date(),
        'active' => $faker->boolean,
    ];
});
