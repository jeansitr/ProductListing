<?php

namespace Database\Factories;

use App\Models\Seller;
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
            'price' => rand(0, 2000),
            'available' => fake()->boolean(),
            'image' => $title,
            'seller_id' => Seller::factory(),
        ];
    }
}
