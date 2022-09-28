<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class Posts_controller extends Controller
{
    public function create(Request $request)
    {
        if($request->image_file){
            error_log('Some inside the filfilfilfilfilfilf here.');
            $validator = $request->validate([
                'title' => 'required|string|min:0|max:300',
                'main_text' => 'required|string|min:0|max:750',
                'selected_sub' => 'required|integer|min:1',
                'image_file' => 'image|max:4096|mimes:jpeg,jpg,png,gif'
            ]);
            $file= $request->file('image_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $post_created = Post::create([
                'owner_id' => Auth::user()->id,
                'sub_id' => $request->selected_sub,
                'content' => json_encode(['title'=>$request->title,'body'=>$request->main_text,'images'=>[$filename]])
            ]);
            return redirect('/');
        }
        
        error_log('outoutoutoutoutoutout.');

        $validator = $request->validate([
            'title' => 'required|string|min:0|max:300',
            'main_text' => 'required|string|min:0|max:750',
            'selected_sub' => 'required|integer|min:1',
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

    public function delete(Request $request)
    {
        if(ctype_digit($request->id)){
            Post::where('id',$request->id)->where('owner_id', Auth::user()->id)->delete();
            return ($request->id.'/////'.gettype($request->id));
        }
    }
    
}




