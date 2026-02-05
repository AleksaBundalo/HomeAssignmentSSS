<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

//blog main page
Route::get('/', [PostController::class, 'index'])->name('posts.index');

//should work as 7 different routes for posts (create, store, edit, update, etc.)
Route::resource('posts', PostController::class);

