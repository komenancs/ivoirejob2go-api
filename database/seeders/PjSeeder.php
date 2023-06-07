<?php

namespace Database\Seeders;

use App\Models\Pj;
use Illuminate\Database\Seeder;
use Database\Factories\PjFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pj::factory()
            ->count(15)
            ->create();
    }
}
