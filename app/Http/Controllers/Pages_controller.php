<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sub;
use App\Models\User;


class Pages_controller extends Controller
{
    public function home_page()
    {   /*    
        $data = array();
        $count = Post::count();
        for ($i = 1; $i <= $count; $i++) {
            $post = Post::find($i);
            array_push($data,$post);
            if(!isset($sub_data[$post->sub_id])){
                $sub_data[$post->sub_id] = Sub::where('id',$post->sub_id)->first();
            }
            if(!isset($user_data[$post->owner_id])){
                $user_data[$post->owner_id] = User::where('id',$post->sub_id)->first();;
            }
        }
        */
        //return view('home_page')->with('data',$data)->with('subs_data',$sub_data)->with('user_data',$user_data);
        return view('home_page');
    }


    public function sub_page($id)
    {
        return view('sub');
    }


    public function thread_page($id)
    {
        return view('thread');
    }

    
    public function user_page($id)
    {
        return view('user');
    }
}
