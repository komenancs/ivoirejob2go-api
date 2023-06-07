<?php

namespace Database\Seeders;

use App\Models\Metier;
use Illuminate\Database\Seeder;
use Database\Factories\MetierFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metier::factory()
            ->count(15)
            ->create();
    }
}
