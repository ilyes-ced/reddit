<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = ['owner_id','post_id','content','parent_comment_id'];



    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
}
