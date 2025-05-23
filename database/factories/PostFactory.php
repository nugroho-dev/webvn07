<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(4, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(mt_rand(6, 10)),
            'body' => $this->faker->paragraph(mt_rand(50, 100)),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 2),
            'status' => 'draft'
        ];
    }
}
