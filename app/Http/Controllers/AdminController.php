<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index");
    }

    public function posts() {
        return view("admin.posts", [
            "posts" => Post::simplePaginate(6)
        ]);
    }

    public function author() {
        return view("admin.authors", [
            "authors" => User::where('role', 'author')->simplePaginate(4)
        ]);
    }

    public function comments() {
        return view("admin.comments", [
            "comments" => Comment::simplePaginate(6)
        ]);
    }
}
