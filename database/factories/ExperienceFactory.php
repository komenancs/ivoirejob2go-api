<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
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
            'job_title' => $this->faker->words(5, true),
            'activity_description' => $this->faker->sentence(5),
            'start_date'=> $this->faker->date(),
            'end_date' => $this->faker->date(),
            'company_name' => $this->faker->company(),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
