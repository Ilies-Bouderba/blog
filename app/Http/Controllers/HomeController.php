<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories
        $categories = Category::all();

        $categories->each(function ($category) use ($request) {
            $sanitizedName = str_replace([' ', '.', '&', '%', '#'], '_', strtolower($category->name));
            $category->posts = $category->post()->simplePaginate(
                3, // Items per page
                ['*'], // Columns to select
                $sanitizedName . '_page', // Custom query parameter
                $request->input($sanitizedName . '_page', 1) // Current page
            );
        });

        return view('index', [
            'categories' => $this->Categories(),
            'posts' => $this->Posts(),
            'categoryPosts' => $categories,
        ]);
    }

    public function Categories () {
        return Category::all();
    }

    public function Posts () {
        return Post::simplePaginate(3);
    }
}
