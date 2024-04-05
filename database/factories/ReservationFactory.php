<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Photographer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'time' => fake()->time($format = 'H:i:s', $max = 'now'),
            'location' => fake()->address(),
            'numberOfPeople' => fake()->numberBetween($min = 0, $max = 60),
            'image' => fake()->imageUrl(),
            'status' => fake()->name(),
            'event_id' => Event::inRandomOrder()->first()->id,
            'photographer_id' => Photographer::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
