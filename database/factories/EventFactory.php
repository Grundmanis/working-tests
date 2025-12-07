<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'registration_start' => now()->subDays(5),
            'registration_end' => now()->addDays(10),
            'location_id' => Location::factory(),
            'user_id' => User::factory(),
            'start_date' => now()->addDays(1),
            'end_date' => now()->addDays(3),
            'secretary' => $this->faker->sentence(2)
        ];
    }
}
