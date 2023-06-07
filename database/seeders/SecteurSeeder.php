<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Seeder;
use Database\Factories\SecteurFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Secteur::factory()
            ->count(15)
            ->create();
    }
}
