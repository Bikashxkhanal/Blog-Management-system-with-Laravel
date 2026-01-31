<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'discription' => fake()->paragraph(20),
            'img_path' => fake()->imageUrl(640 , 480),
            'user_id' => fake()->randomElement([1, 2]),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
