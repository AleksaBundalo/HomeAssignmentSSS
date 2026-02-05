<?php

namespace App\Http\Controllers;

abstract class PostController
{
    public function create()
{
    return view('posts.create'); 
}

public function index()
{
    //fetch all posts from the database using the model
    $posts = \App\Models\Post::latest()->get();

    //pass the posts to the view
    return view('posts.index', compact('posts'));
}

public function store(Request $request)
{

    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    //saves the post using the user relationship
    \App\Models\Post::create([
        'user_id' => 1, 
        'title' => $validated['title'],
        'content' => $validated['content'],
    ]);

    
    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}
}
