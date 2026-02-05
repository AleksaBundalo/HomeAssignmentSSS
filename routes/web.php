<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

//route for comments to work
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

//blog main page
Route::get('/', [PostController::class, 'index'])->name('posts.index');

//should work as 7 different routes for posts (create, store, edit, update, etc.)
Route::resource('posts', PostController::class);

