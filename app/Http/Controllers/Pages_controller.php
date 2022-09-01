<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread_model;
use App\Models\Sub;
use App\Models\User;


class Pages_controller extends Controller
{
    public function home_page()
    {
        return view('home_page');
    }
    public function sub_page($id)
    {
        $sub_info = Sub::where('id',$id)->first();
        return view('sub')->with('data',$sub_info);
    }
    public function thread_page($id)
    {
        dd($id);
        return view('thread');
    }
    public function user_page($id)
    {
        dd($id);
        return view('user');
    }
}
