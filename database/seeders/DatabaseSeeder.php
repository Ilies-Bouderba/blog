<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(4)->create();
        $author = User::where("role", "author")->first();
        if($author) {
            Post::factory(25)->create();
        }
        if (Post::count() > 0) {
            Comment::factory(100)->create();
        }
    }
}
