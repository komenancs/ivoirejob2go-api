<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            
            /*AbonnementSeeder::class,
            CandidatSeeder::class,
            CandidatureSeeder::class,
            CertificatSeeder::class,
            CompetenceSeeder::class,
            DemandeSeeder::class,
            EmployeurSeeder::class,
            ExperienceSeeder::class,
            FormationSeeder::class,
            LocalisationSeeder::class,
            MessageSeeder::class,
            MetierSeeder::class,
            NotificationSeeder::class,
            PaiementSeeder::class,
            PjSeeder::class,
            ReglageSeeder::class,
            RoleSeeder::class,
            SecteurSeeder::class,
            TypeCertificatSeeder::class,
            TypeContratSeeder::class,
            UserSeeder::class,*/ 
        ]);

        /*for ($i=0; $i < 6; $i++) { 
            DB::table('demande_metier')->insert([
            'demande_id' => fake()->randomDigitNotNull(),
            'metier_id' => fake()->randomDigitNotNull(),
            ]);

            DB::table('demande_secteur')->insert([
            'demande_id' => fake()->randomDigitNotNull(),
            'secteur_id' => fake()->randomDigitNotNull(),
            ]);

            DB::table('demande_localisation')->insert([
            'demande_id' => fake()->randomDigitNotNull(),
            'localisation_id' => fake()->randomDigitNotNull(), 
            ]);

            DB::table('demande_competence')->insert([
            'demande_id' => fake()->randomDigitNotNull(),
            'competence_id' => fake()->randomDigitNotNull(),  
            ]);

            DB::table('employeur_secteur')->insert([
            'employeur_id' => fake()->randomDigitNotNull(),
            'secteur_id' => fake()->randomDigitNotNull(),
            ]);

            DB::table('candidat_metier')->insert([
            'candidat_id' => fake()->randomDigitNotNull(),
            'metier_id' => fake()->randomDigitNotNull(),
            ]);

            DB::table('competence_candidat')->insert([
            'competence_id' => fake()->randomDigitNotNull(),
            'candidat_id' => fake()->randomDigitNotNull(),
            ]);
            
        }*/
    }
}
