<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificat>
 */
class CertificatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_certificat_id' => $this->faker->randomDigitNotNull(),
            'candidat_id' => $this->faker->randomDigitNotNull(),
            'nom' => Str::random(10),
            'numero_certificat' => $this->faker->randomNumber(6),
            'date_obtention' => $this->faker->date(),
            'user_create_id' =>  $this->faker->randomDigitNotNull(),
            'user_update_id' =>  $this->faker->randomDigitNotNull(),
        ];
    }
}
