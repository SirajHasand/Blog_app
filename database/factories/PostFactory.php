<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
/**
 * @extends Factory<post>
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
            // 'title', 'content','image','slug'
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => 'demo.jpeg',
            // Generate a URL-friendly slug from a fake sentence
            'slug' => Str::slug(fake()->sentence())
        ];
    }
}
