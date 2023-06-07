<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competence>
 */
class CompetenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => Str::random(10),
            'description' => $this->faker->sentence(5),
            'user_create_id' =>  $this->faker->randomDigitNotNull(),
            'user_update_id' =>  $this->faker->randomDigitNotNull(),
        ];
    }
}
