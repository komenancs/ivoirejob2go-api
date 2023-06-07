<?php

namespace Database\Seeders;

use App\Models\Competence;
use Illuminate\Database\Seeder;
use Database\Factories\CompetenceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competence::factory()
            ->count(15)
            ->create();
    }
}
