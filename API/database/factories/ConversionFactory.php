<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Conversion;
use Faker\Generator as Faker;

$factory->define(Conversion::class, function (Faker $faker) {
    return [
        'exchange_rate' => $faker->randomFloat(2, 0, 100),
    ];
});

