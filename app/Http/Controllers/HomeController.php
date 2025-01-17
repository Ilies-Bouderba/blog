<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        return view("index", [

            "categories" => $this->Categories(),
            "posts" => $this->Posts(),
            "categoryPosts" => Category::with('post')->get(),
        ]);
    }

    public function Categories () {
        return Category::all();
    }

    public function Posts () {
        return Post::limit(3)->get();
    }
}
