<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition()
    {
        return [
            'code' => $this->faker->currencyCode, // Utilise une valeur aléatoire de code de devise (par exemple "USD", "EUR", etc.)
            'amount' => $this->faker->randomFloat(2, 0, 1000), // Utilise un montant aléatoire avec deux décimales
        ];
    }
}

