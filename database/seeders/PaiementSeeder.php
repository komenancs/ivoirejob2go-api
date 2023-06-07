<?php

namespace Database\Seeders;

use App\Models\Paiement;
use Illuminate\Database\Seeder;
use Database\Factories\PaiementFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paiement::factory()
            ->count(15)
            ->create();
    }
}
