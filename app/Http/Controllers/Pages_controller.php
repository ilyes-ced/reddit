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
        //$post = Post::orderByDesc('created_at')->paginate(10);
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


/*
    public function load_more(Request $request)
    {
        if(ctype_digit($request->id)){
            $posts = DB::table('users')
                ->offset($request->number_of_elments)
                ->limit(5)
                ->get();
                return("f");
        }else{
            return('errrrr');
        }
    }
*/

public function profile_page()
{
    return view('profile_page');
}


}




