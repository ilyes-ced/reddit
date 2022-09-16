<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class Comments_controller extends Controller
{
    public function create_comment(Request $request)
    {

        //dd($request->all());
        $validator = $request->validate([
            'main_text' => 'required|string|min:0|max:500',
            'post_id' => 'required|integer|min:1|exists:posts,id'
        ]);

        $post_created = Comment::create([
            'content' => $request->main_text,
            'owner_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'parent_comment_id' => 0,

        ]);

        //tempo
        return redirect()->back();
    }


    public function vote_comment(Request $request)
    {
        
    }


}
