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
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }

    public function searchPost(Request $request) {
        $search = $request->input('search');
        return view("admin.posts", [
            "posts" => Post::where('title', 'like', "%{$search}%")
            ->orWhereHas('author', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->simplePaginate(6),
            'search' => $search
        ]);
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

    public function searchAuthor(Request $request) {
        $search = $request->input('search');
        return view("admin.authors", [
            "authors" => User::where('name', 'like', "%{$search}%")->Where('role', 'author')
            ->simplePaginate(4),
            'search' => $search
        ]);
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

    public function searchComment(Request $request) {
        $search = $request->input('search');
        return view("admin.comments", [
            "comments" => Comment::where('content', 'like', "%{$search}%")
            ->simplePaginate(6),
            'search' => $search
        ]);
    }
}
