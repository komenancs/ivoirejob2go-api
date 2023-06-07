<?php

namespace Database\Seeders;

use App\Models\Localisation;
use Illuminate\Database\Seeder;
use Database\Factories\LocalisationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocalisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Localisation::factory()
            ->count(15)
            ->create();
    }
}
