<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employeur>
 */
class EmployeurFactory extends Factory
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
            'localisation_id' => $this->faker->randomDigitNotNull(),
            'description' => $this->faker->sentence(5),
            'logo' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'email' => $this->faker->companyEmail(),
            'contact_1' => $this->faker->e164PhoneNumber(),
            'contact_2' => $this->faker->e164PhoneNumber(),
            'site_web' => $this->faker->url(),
            'abonnement_id' => $this->faker->numberBetween(1, 10),
            'nombre_demandes_restantes' => $this->faker->randomDigit(),
            'lien_twitter' => $this->faker->url(),
            'lien_facebook' => $this->faker->url(),
            'lien_linkedin' => $this->faker->url(),
            'user_create_id' => $this->faker->randomDigitNotNull(),
            'user_update_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
