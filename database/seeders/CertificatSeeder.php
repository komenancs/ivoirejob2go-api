<?php

namespace Database\Seeders;

use App\Models\Certificat;
use Illuminate\Database\Seeder;
use Database\Factories\CertificatFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certificat::factory()
            ->count(15)
            ->create();
    }
}
