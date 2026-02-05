<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // A Post can have many Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // A Post belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}