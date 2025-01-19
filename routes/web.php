<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog');
Route::post('/blog/{id}/comment', [PostController::class, 'comment'])->name('blog.comment');
Route::delete('/blog/{id}/comment/delete', [PostController::class, 'deleteComment'])->name('blog.comment.delete');
Route::post('/', [PostController::class, 'search'])->name('blog.search');
Route::get('/image/{filename}', [ImageController::class, 'show'])->name('image.show');

Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::post('/login', [SessionController::class, 'authenticate'])->name('authenticate');
Route::get('/signup', [SessionController::class, 'signup'])->name('signup');
Route::post('/signup', [SessionController::class, 'register'])->name('register');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/author', [AdminController::class, 'author'])->name('admin.author');
    Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');

    Route::delete('/admin/posts/{post}', [AdminController::class, 'deletePost'])->name('admin.posts.delete');
    Route::delete('/admin/comments/{comment}', [AdminController::class, 'deleteComment'])->name('admin.comments.delete');
    Route::patch('/admin/author/{author}', [AdminController::class, 'patchAuthor'])->name('admin.author.patch');
    Route::post('/admin/author', [AdminController::class, 'postAuthor'])->name('admin.author.post');

    Route::post('/admin/posts/search', [AdminController::class, 'searchPost'])->name('admin.posts.search');
    Route::post('/admin/comments/search', [AdminController::class, 'searchComment'])->name('admin.comments.search');
    Route::post('/admin/author/search', [AdminController::class, 'searchAuthor'])->name('admin.author.search');
});

Route::middleware('author')->group(function () {
    Route::get('/author', [AuthorController::class, 'index'])->name('author');
    Route::delete('/author/post/{post}', [AuthorController::class, 'deletePost'])->name('author.delete');
    Route::get('/author/post/{post}/edit', [AuthorController::class, 'editPost'])->name('author.edit');
    Route::put('/author/post/{id}', [AuthorController::class, 'updatePost'])->name('author.update');
    Route::get('/author/post/create', [AuthorController::class, 'createPost'])->name('author.create');
    Route::post('/author/post/create', [AuthorController::class, 'storePost'])->name('author.store');
});


Route::fallback(function () {
    return abort(404);
});
