<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
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
            'titre' => $this->faker->words(5, true),
            'ecole' => $this->faker->words(3, true),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'description' => $this->faker->sentence(5),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
