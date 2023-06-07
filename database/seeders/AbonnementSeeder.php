<?php

namespace Database\Seeders;

use App\Models\Abonnement;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abonnement::factory()
            ->count(15)
            ->create();
    }
}
