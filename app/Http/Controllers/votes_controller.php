<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Votes_controller extends Controller
{
    public function index(Request $request)
    {   
        if($request->type == 'up_vote'){
            DB::Table('posts')->whereid($request->id)->Increment('heat');
        }elseif($request->type == 'down_vote'){
            DB::Table('posts')->whereid($request->id)->decrement('heat');
        }else{
            
        }
        return response()->json($request->type);
    }
}
