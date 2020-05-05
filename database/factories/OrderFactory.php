<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'orderno' => $faker->word,
        'address' => $faker->word,
        'city' => $faker->city,
        'pincode' => $faker->word,
        'phone' => $faker->phoneNumber,
        'amount' => $faker->randomFloat(2, 0, 999999.99),
        'discount_amount' => $faker->randomFloat(2, 0, 999999.99),
        'net_total' => $faker->randomFloat(2, 0, 999999.99),
        'status' => $faker->word,
        'payment' => $faker->word,
        'payment_id' => $faker->word,
        'products' => '{}',
    ];
});
