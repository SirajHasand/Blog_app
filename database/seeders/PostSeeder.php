<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Seed 10 posts using the Post factory
        Post::factory()->count(10)->create();
    }
}