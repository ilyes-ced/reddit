<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class Posts_images_controller extends Controller
{
    public function create(Request $request)
    {

        $formInput=$request->all();
        $image=array();
        if($files=$request->file()){
            error_log('feruherogipehoi');
            foreach($files as $file){
                $name=date('YmdHi').$file->getClientOriginalName();
                $file->move('images',$name);
                $image[]=$name;

            }
        }
        
        $post_created = Post::create([
            'owner_id' => Auth::user()->id,
            'sub_id' => $request->selected_sub,
            'content' => json_encode(['title'=>$request->title,'images'=>$image])
        ]);
        return redirect()->back(); 
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
    
}




