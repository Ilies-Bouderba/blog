<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function show(Request $request) {
        $id = $request->id;
        $post = Post::findOrFail($id);
        return view("post.show", compact("post"));
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $posts = Post::where("title", "like", "%{$search}%")->simplePaginate(6);
        return view("search", [
            "posts" => $posts,
            "search" => $search
        ]);
    }

    public function comment(Request $request) {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create(attributes: [
            "user_id" => Auth::id(),
            "post_id" => $request->id,
            "content" => $request->input('content'),
        ]);

        return redirect('/blog/' . $request->id);
    }

    public function deleteComment(Request $request) {
        $comment = Comment::findOrFail($request->id);
        $comment->delete();
        return redirect('/blog/' . $comment->post_id);
    }
}
