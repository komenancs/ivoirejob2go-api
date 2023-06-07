<?php

namespace Database\Seeders;

use App\Models\Reglage;
use Illuminate\Database\Seeder;
use Database\Factories\ReglageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReglageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reglage::factory()
            ->count(15)
            ->create();
    }
}
