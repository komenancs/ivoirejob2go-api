<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reglage>
 */
class ReglageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(6),
            'value' => Str::random(6),
            'comment' => $this->faker->word(),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
