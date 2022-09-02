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
        $data = Thread_model::take(15)->get();
        foreach ($data as $item){
            $users[$item->owner_id]= User::where('id',$item->owner_id)->pluck('username')->first();
            $subs[$item->sub] = Sub::where('id',$item->sub)->pluck('name')->first();
            $item->push('username'->User::where('id',$item->owner_id)->pluck('username')->first());
            $item->push('sub_name'->Sub::where('id',$item->sub)->pluck('name')->first());
       
        }
        
        echo gettype($data);
        return view('home_page')->with('data',$data)->with('user_data',$users)->with('subs_data',$subs);
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
