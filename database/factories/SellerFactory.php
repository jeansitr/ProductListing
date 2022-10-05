<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
        ];
    }

    /*
    public function configure()
    {
        return $this->afterMaking(function (Seller $seller) {
            Product::factory(5)->make(['seller_id' => $seller->id]);
        })->afterCreating(function (Seller $seller) {
            Product::factory(5)->create(['seller_id' => $seller->id]);
        });
    }
    */
}
