<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->unique()->name();

        return [
            'title' => $title,
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0.99, 10000),
            'available' => fake()->boolean(),
            'image' => $title,
        ];
    }
}
