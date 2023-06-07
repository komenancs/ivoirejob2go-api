<?php

namespace Database\Seeders;

use App\Models\TypeCertificat;
use Illuminate\Database\Seeder;
use Database\Factories\TypeCertificatFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeCertificatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCertificat::factory()
            ->count(15)
            ->create();
    }
}
