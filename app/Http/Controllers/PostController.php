<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
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

public function show(string $id)
    {
        //finds the post by ID or shows 404
        $post = Post::findOrFail($id);

        //passes to show view
        return view('posts.show', compact('post'));
    }

public function edit(string $id)
{
    //finds the post by ID or shows 404
    $post = \App\Models\Post::findOrFail($id);
    
    //passes to edit view
    return view('posts.edit', compact('post'));
}

public function update(Request $request, string $id)
{
    //validating that the post meets requirements
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $post = \App\Models\Post::findOrFail($id);
    
    //update record
    $post->update($validated);

    //redirect with success message
    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}

public function destroy(string $id)
{
    $post = \App\Models\Post::findOrFail($id);
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted!');
}
}
