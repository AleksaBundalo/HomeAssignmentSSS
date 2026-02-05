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

public function __construct()
{
    //you can only see index and show if you're not logged in
    $this->middleware('auth')->except(['index', 'show']);
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
    $post = \App\Models\Post::create([
        'user_id' => auth()->id(), //use id of who's currently logged in
        'title' => $validated['title'],
        'content' => $validated['content'],
    ]);

    $post->media_link = $request->media_link;
    $post->save();

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
    //finds the post by ID or shows 404 (this will prob never be used but just in case)
    $post = \App\Models\Post::findOrFail($id);    

if ($post->user_id !== auth()->id()) {
        return redirect()->route('posts.index')->with('error', 'Unauthorized access!'); //if you're logged into a different account you shouldnt even see this but just in case its here
    }

    //passes to edit view
    return view('posts.edit', compact('post'));
}

public function update(Request $request, string $id)
{

    $post = \App\Models\Post::findOrFail($id);
    if ($post->user_id !== auth()->id()){
        abort(403, 'Unauthorized Action'); //also makes sure that it's the correct user
    }
    //validating that the post meets requirements
    $validated = $request->validate([
        'title' => 'required|max:100',
        'content' => 'required',
    ]);
    
    $post->media_link = $request->media_link;
    
    //update record
    $post->update($validated);

    //redirect with success message
    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}

public function destroy(string $id)
{
    $post = \App\Models\Post::findOrFail($id);
    if ($post->user_id !== auth()->id()){
    abort(403, 'Unauthorized Action'); //also makes sure that it's the correct user, even though it should be hidden if you're not logged into the right account
    }
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted!');
}


}
