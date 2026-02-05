<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        //validate min comment size
        $request->validate([
            'body' => 'required|min:1'
        ]);

        //create the comment linked to a specific post
        $post->comments()->create([
        'body' => $request->body,    
        'user_id' => auth()->id() //dynamically assign author
            
        ]);

        return back()->with('success', 'Comment added!');
    }
}