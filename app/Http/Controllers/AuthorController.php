<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index() {
        return view("author.index", [
            "posts" => Post::where('author_id', Auth::user()->id)->simplePaginate(4),
            "count" => Post::where('author_id', Auth::user()->id)->count(),
        ]);
    }

    public function deletePost(Post $post) {
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('author')->with('success', 'Post deleted successfully');
    }

    public function editPost(Post $post) {
        return view('author.edit', [
            'post' => $post,
        ]);
    }

    public function updatePost(Request $request) {
        $post = Post::find($request->id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return redirect()->route('author')->with('success', 'Post updated successfully');
    }

    public function createPost() {
        return view('author.create', [
            'categories' => Category::all(),
        ]);
    }

    public function storePost(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('private/images', 'local');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath ?? null,
            'author_id' => Auth::user()->id,
        ]);

        return redirect()->route('author')->with('success', 'Post created successfully');
    }
}
