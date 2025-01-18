<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

    }

    public function show(Request $request) {
        $id = $request->id;
        $post = Post::findOrFail($id);
        return view("post.show", compact("post"));
    }
}
