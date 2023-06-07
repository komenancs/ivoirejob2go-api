<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localisation>
 */
class LocalisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pays' => $this->faker->country(),
            'ville' => $this->faker->city(),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull(),
            'quatier' => $this->faker->streetName(),
            'rue' => $this->faker->streetAddress(),
        ];
    }
}
