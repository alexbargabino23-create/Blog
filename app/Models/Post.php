<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    // ✅ Add these relationships inside the Post model
    // A post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
