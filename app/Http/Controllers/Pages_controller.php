<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sub;
use App\Models\User;
use App\Models\Comment;


class Pages_controller extends Controller
{
    public function home_page()
    {   
        $data = array();
        $post = Post::paginate(10);
        $count =  count($post);
        for ($i = 1; $i <= $count-1; $i++) {
            if(!isset($sub_data[$post[$i]->sub_id])){
                $sub_data[$post[$i]->sub_id] = Sub::where('id',$post[$i]->sub_id)->first();
            }
            if(!isset($user_data[$post[$i]->owner_id])){
                $user_data[$post[$i]->owner_id] = User::where('id',$post[$i]->sub_id)->first();;
            }
        }
        return view('home_page')->with('post',$post)->with('subs_data',$sub_data)->with('user_data',$user_data);
    }


    public function sub_page($id)
    {
        return view('sub');
    }


    public function post_page($id)
    {
        $data = Post::find($id);
        $comments = Comment::where('parent_comment_id',0)->get();
        $sub_comments = Comment::where('parent_comment_id', '!=', 0)->get();
      
        return view('post')->with('data',$data)->with('comments',$comments)->with('sub_comments',$sub_comments);
    }

    
    public function user_page($id)
    {
        return view('user');
    }
}
