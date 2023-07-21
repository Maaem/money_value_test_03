<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paire>
 */
class PairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "currencie" => Currency::factory()->create()->code,
            "to_currencie" => Currency::factory()->create()->code,
            "conversion_rate" => fake()->randomFloat(2, 0, 10),
            "conversion_number" => fake()->randomDigitNotNull(),
        ];
    }
}