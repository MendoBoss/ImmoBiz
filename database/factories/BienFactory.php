<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->randomElement([1,2,3,4,5]),
            'user_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'state' => fake()->randomElement(['libre','occupé']),
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'address' => fake()->address(),
            'ville' => fake()->city(),
            'price' => fake()->randomFloat(2,500,1500),
            'caution' => fake()->randomFloat(2,500,800),
            'image' => fake()->imageUrl(640, 480, 'houses', true),
        ];
    }
}
