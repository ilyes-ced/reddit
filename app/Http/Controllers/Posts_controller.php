<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class Posts_controller extends Controller
{
    public function create(Request $request)
    {
        
        $validator = $request->validate([
            'title' => 'required|string|min:0|max:300',
            'main_text' => 'required|string|min:0|max:750',
            'selected_sub' => 'required|integer|min:1'
        ]);

        $post_created = Post::create([
            'owner_id' => Auth::user()->id,
            'sub_id' => $request->selected_sub,
            'content' => json_encode(['title'=>$request->title,'body'=>$request->main_text])
        ]);

        //tempo
        return redirect('/');
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
    
}




