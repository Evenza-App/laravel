<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDetail>
 */
class EventDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => fake()->name(),
            'options' => json_encode([
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),

            ]),
            'is_required' => fake()->boolean(),
            'event_id' => Event::inRandomOrder()->first()->id,
        ];
    }
}
