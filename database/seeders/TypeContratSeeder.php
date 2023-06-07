<?php

namespace Database\Seeders;

use App\Models\TypeContrat;
use Illuminate\Database\Seeder;
use Database\Factories\TypeContratFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeContrat::factory()
            ->count(15)
            ->create();
    }
}
