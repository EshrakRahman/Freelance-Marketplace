<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => fake()->words(3, true),
            'description' => fake()->paragraph,
            'price'       => fake()->randomFloat(2, 10, 500),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
