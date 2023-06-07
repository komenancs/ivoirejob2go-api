<?php

namespace Database\Seeders;

use App\Models\Employeur;
use Illuminate\Database\Seeder;
use Database\Factories\EmployeurFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employeur::factory()
        ->count(15)
        ->create();
    }
}
