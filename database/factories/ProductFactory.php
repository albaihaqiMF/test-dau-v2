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
        $prices = [10000, 15000, 20000, 50000, 100000];
        return [
            'name'      => $this->faker->name(),
            'price'     => $prices[rand(0, count($prices) -1)],
            'stock'     => rand(10, 20),
        ];
    }
}
