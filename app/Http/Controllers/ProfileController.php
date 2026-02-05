<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ProfileController extends Controller
{
    //show the logged in user's profile
    public function myProfile() {
    $user = auth()->user();
    $posts = $user->posts()->latest()->get();
    return view('profile.show', compact('user', 'posts'));
}

    //update bio
    public function updateBio(Request $request) {
    $request->validate([
        'bio' => 'nullable|string|max:500']);
        $user = auth()->user();
        $user->update([
        'bio' => $request->bio]);
    return back()->with('success', 'Bio updated!');
}

    public function profile(\App\Models\User $user)
    {
    //show posts only from specific user
    $posts = $user->posts()->latest()->get();

    return view('profile.show', compact('user', 'posts'));
}

}
