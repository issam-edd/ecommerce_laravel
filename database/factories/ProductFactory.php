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
    public function definition()
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween($min = 100, $max = 900),
            'old_price' => fake()->numberBetween($min = 100, $max = 900),
            'inStock' => fake()->numberBetween($min = 1, $max = 10),
            'image' => 'https://picsum.photos/seed/' . fake()->uuid() . '/640/480',
            'category_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
