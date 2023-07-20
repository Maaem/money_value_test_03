<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pair;
use App\Models\Currency;

class PairSeeder extends Seeder
{
    public function run()
    {
        // Liste de codes de devises fictives
        $currencies = ['USD', 'EUR', 'GBP', 'JPY', 'CAD', 'AUD', 'CHF', 'NZD'];

        // Compteur pour limiter le nombre de paires de devises à 5
        $pairCount = 0;

        // Crée des paires de devises fictives pour chaque code de devise
        foreach ($currencies as $currency) {
            foreach ($currencies as $toCurrency) {
                if ($currency !== $toCurrency && $pairCount < 5) {
                    Pair::create([
                        'currencie' => $currency,
                        'to_currencie' => $toCurrency,
                        'value' => random_int(1, 100), // Utilise un taux de change fictif
                        'conversion_count' => random_int(0, 10),
                    ]);

                    // Augmente le compteur après avoir inséré une paire de devises
                    $pairCount++;
                }
            }
        }
    }
}


