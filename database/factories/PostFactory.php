<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence,
            "content" => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480, 'posts', true),
            "user_id" => User::inRandomOrder()->first()->id,
            "category_id" => Category::inRandomOrder()->first()->id,

        ];
    }
}
