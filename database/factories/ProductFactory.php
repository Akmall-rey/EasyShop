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
    public function definition(): array
    {
        return [
            'name'=> fake()->sentence(mt_rand(1,3)),
            'stock'=>fake()->numberBetween(1, 30),
            'price'=>fake()->numberBetween(5000, 50000),
            'toko_id'=> mt_rand(1,4)
        ];
    }
}
