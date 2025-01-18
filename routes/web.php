<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog');
Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::get('/signup', [SessionController::class, 'signup'])->name('signup');
