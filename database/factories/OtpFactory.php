<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Otp;
use Faker\Generator as Faker;

$factory->define(Otp::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'active' => $faker->boolean,
    ];
});
