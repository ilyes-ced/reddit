<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sub;
use App\Models\User;
use App\Models\Comment;
use DB;
use Auth;

class Pages_controller extends Controller
{
    public function home_page()
    {
        
        $post = Post::orderByDesc('created_at')->take(5)->get();
        return view('home_page')->with('post',$post);
    }


    public function sub_page($id)
    {
        $data = Sub::find($id);

        return view('sub')->with('data',$data);
    }


    public function post_page($id)
    {
        
        DB::Table('posts')->whereid($id)->increment('views');
        $data = Post::find($id);
        $comments = Comment::where('parent_comment_id',0)->where('post_id',$id)->get();
        return view('post')->with('data',$data)->with('comments',$comments);
    }

    
    public function user_page($id)
    {
        return view('user');
    }


    
    

    public function login_page()
    {
        return view('login');
    }    
    public function register_page()
    {
        return view('register');
    }

    public function add_post()
    {
        if (Auth::user()){
            $joined = Sub::find(json_decode(Auth::user()->joined_subs));
        }
        return view('add_post')->with('subs',$joined);
    }




    public function profile_page()
    {
        $posts = Post::where('owner_id', Auth::user()->id)->get();
        $comments = Comment::where('owner_id', Auth::user()->id)->get();
        $up_votes = Post::whereIn('id', json_decode(Auth::user()->up_votes))->get();
        $down_votes = Post::whereIn('id', json_decode(Auth::user()->down_votes))->get();
        $subs = Sub::whereIn('id', json_decode(Auth::user()->joined_subs))->get();
        $bookmarks = Post::whereIn('id', json_decode(Auth::user()->bookmarks))->get();
        return view('profile_page')->with('posts',$posts)
        ->with('comments',$comments)
        ->with('up_votes',$up_votes)
        ->with('down_votes', $down_votes)
        ->with('subs', $subs)
        ->with('bookmarks', $bookmarks);
    }


}




