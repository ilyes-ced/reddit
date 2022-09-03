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
        $sub_comments1 = Comment::where('parent_comment_id', 1)->get();
        $sub_comments2 = Comment::where('parent_comment_id', 2)->get();
        $sub_comments3 = Comment::where('parent_comment_id', 3)->get();
        $sub_comments4 = Comment::where('parent_comment_id', 4)->get();
        $sub_comments5 = Comment::where('parent_comment_id', 5)->get();
        $sub_comments6 = Comment::where('parent_comment_id', 6)->get();
        $sub_comments7 = Comment::where('parent_comment_id', 7)->get();
        $sub_comments8 = Comment::where('parent_comment_id', 8)->get();
        $sub_comments9 = Comment::where('parent_comment_id', 9)->get();

      /* $json =  json_encode(['title'=>'this is big title help me please',
        'body'=>'body text long here',
        'images'=>['pic1.jpg','pic2.jpg','pic3.jpg']]);*/
        
       
        return view('post')->with('data',$data)->with('comments',$comments)
        ->with('sub_comments1',$sub_comments1)
        ->with('sub_comments2',$sub_comments2)
        ->with('sub_comments3',$sub_comments3)
        ->with('sub_comments4',$sub_comments4)
        ->with('sub_comments5',$sub_comments5)
        ->with('sub_comments6',$sub_comments6)
        ->with('sub_comments7',$sub_comments7)
        ->with('sub_comments8',$sub_comments8)
        ->with('sub_comments9',$sub_comments9);
    }

    
    public function user_page($id)
    {
        return view('user');
    }
}
