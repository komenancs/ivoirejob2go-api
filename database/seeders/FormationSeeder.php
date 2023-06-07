<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;
use Database\Factories\FormationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formation::factory()
            ->count(15)
            ->create();
    }
}
