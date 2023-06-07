<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidat>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'abonnement_id' => $this->faker->numberBetween(1, 10),
            'nombre_demandes_restantes' => $this->faker->randomDigit(),
            'fin_abonnement' => $this->faker->date(),
            'presentation' => $this->faker->sentence(5),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull()
        ];
    }
}
