<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'address' => $faker->word,
        'city' => $faker->city,
        'pincode' => $faker->word,
        'phone' => $faker->phoneNumber,
        'default' => $faker->boolean,
    ];
});
