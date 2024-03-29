<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;

    protected $fillable = ['number_of_members','name','threads'];
    




    public function user()
    {
        return $this->belongsTo(User::class,"owner_id");
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
