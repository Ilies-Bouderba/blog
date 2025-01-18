<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog');

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
