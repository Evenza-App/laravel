<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buffet>
 */
class BuffetFactory extends Factory
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
            'ingredients' => fake()->text(),
            'image' => fake()->imageUrl(),
            'type' => fake()->name(),
            'price' => fake()->numberBetween(100.000, 900.000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
