<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crée 5 enregistrements pour le modèle Currency en utilisant sa Factory
        Currency::factory()->count(5)->create();

        // Appelle le UserSeeder pour créer un utilisateur
        $this->call(UserSeeder::class);

        // Appelle le PairSeeder pour créer des paires de devises fictives
        $this->call(PairSeeder::class);
    }
}
