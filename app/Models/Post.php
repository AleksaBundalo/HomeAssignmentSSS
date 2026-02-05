<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
protected $fillable = ['user_id', 'title', 'content', 'media_link'];    
//a post can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //a post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}