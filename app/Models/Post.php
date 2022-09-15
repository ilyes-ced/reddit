<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    

    protected $fillable = ['owner_id','sub_id','content'];



    public function user()
    {
        return $this->belongsTo(User::class,"owner_id");
    }
    public function sub()
    {
        return $this->belongsTo(Sub::class,"sub_id");
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,"post_id");
    }
}
