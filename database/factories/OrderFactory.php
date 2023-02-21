<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'product_name' => $title,
            'price' => fake()->numberBetween($min = 100, $max = 900),
            'qty' => fake()->numberBetween($min = 1, $max = 10),
            'total' => fake()->numberBetween($min = 1000, $max = 9000),
            'user_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
