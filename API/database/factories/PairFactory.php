<?php

namespace Database\Factories;
use App\Models\Pair;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;

$factory->define(Pair::class, function (Faker $faker) {
    return [
        'source_currency_id' => Currency::factory(),
        'target_currency_id' => Currency::factory(),
        'conversion_count' => 0,
    ];
});

