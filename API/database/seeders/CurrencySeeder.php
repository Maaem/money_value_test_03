<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;


class CurrencySeeder extends Seeder
    {
        public function run()
        {
            Currency::factory()->count(10)->create();
        }
    }
    
