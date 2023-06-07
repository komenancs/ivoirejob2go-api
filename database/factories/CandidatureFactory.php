<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidature>
 */
class CandidatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidat_id' => $this->faker->randomDigitNotNull(),
            'demande_id' => $this->faker->randomDigitNotNull(),
            'nombre_etoiles' => $this->faker->randomDigitNotNull(),
            'demande_date' => $this->faker->dateTime(),
            'derniere_etoile_date' => $this->faker->dateTime(),
            'approbation_date' => $this->faker->dateTime(),
            'status_paiement' => $this->faker->boolean(),
            'user_create_id' =>  $this->faker->randomDigitNotNull(),
            'user_update_id' =>  $this->faker->randomDigitNotNull(),
        ];
    }
}
