<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dog>
 */
class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registeredName' => $this->faker->sentence(3),
            'homeName' => $this->faker->sentence(1),
            'registrationNumber' => $this->faker->sentence(1),
            'microchip' => $this->faker->sentence(1),
            'dob' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'breed' => $this->faker->randomElement(['LR', 'GR', 'FCR']),
            'user_id' => User::factory(),
        ];
    }
}
