<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => 'Product Name - ' . Str::random(10),
            'image' => $this->faker->imageUrl(120, 120, 'product', true),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
