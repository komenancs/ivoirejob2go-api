<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pj>
 */
class PjFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message_id' => $this->faker->randomDigitNotNull(),
            'filename' => $this->faker->slug(3, false),
            'extension' => $this->faker->fileExtension(),
            'path' => $this->faker->url(),
        ];
    }
}
