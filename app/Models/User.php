<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = array(
        'bookmarks' => '[]',
        'joined_subs' => '[]',
        'comments' => '[]',
        'my_posts' => '[]',
        'my_subs' => '[]',
        'up_votes' => '[]',
        'down_votes' => '[]',
        'up_votes_comments' => '[]',
        'down_votes_comments' => '[]'
    );

    public function subs()
    {
        return $this->hasMany(Sub::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
