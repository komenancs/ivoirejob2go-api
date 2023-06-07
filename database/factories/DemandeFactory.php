<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->words(5, true),
            'employeur_id' => $this->faker->randomDigitNotNull(),
            'description' => $this->faker->sentence(10),
            'nombre_poste' => $this->faker->randomDigitNotNull(),
            'salaire' => $this->faker->randomNumber(5),
            'type_contrat_id' => $this->faker->randomDigitNotNull(),
            'date_publication' => $this->faker->date(),
            'date_expiration' => $this->faker->date(),
            'user_create_id' =>  $this->faker->randomDigitNotNull(),
            'user_update_id' =>  $this->faker->randomDigitNotNull(),
        ];
    }
}
