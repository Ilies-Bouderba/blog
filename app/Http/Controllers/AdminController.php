<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function deletePost(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }

    public function author() {
        return view("admin.authors", [
            "authors" => User::where('role', 'author')->simplePaginate(4)
        ]);
    }

    public function patchAuthor(User $author) {
        $author->update([
                'role' => 'user'
        ]);
        return redirect()->route('admin.author')->with('success', 'Author deleted successfully!');
    }

    public function postAuthor(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('admin.author')->with('error', 'User not found.');
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.author')->with('error', 'Admins cannot be demoted to authors.');
        }

        $user->update([
            'role' => 'author',
        ]);

        return redirect()->route('admin.author')->with('success', 'Author promoted successfully!');
    }

    public function comments() {
        return view("admin.comments", [
            "comments" => Comment::simplePaginate(6)
        ]);
    }

    public function deleteComment(Comment $comment) {
        $comment->delete();
        return redirect()->route('admin.comments')->with('success', 'Comment deleted successfully!');
    }
}
