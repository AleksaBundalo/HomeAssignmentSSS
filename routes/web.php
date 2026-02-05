<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

//route for comments to work
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

//blog main page
Route::get('/', [PostController::class, 'index'])->name('posts.index');

//should work as 7 different routes for posts (create, store, edit, update, etc.)
Route::resource('posts', PostController::class);

//route to allow people to register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//routes to allow logging in and out
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');