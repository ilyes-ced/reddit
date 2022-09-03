<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Pages_controller extends Controller
{
    public function up_vote(Request $request)
    {   
        if($request->type == 'up_vote'){
            DB::Table('posts')->whereid($request->id)->Increment('heat');
        }elseif($request->type == 'down_vote'){
            DB::Table('posts')->whereid($request->id)->decrement('heat');
        }else{
            
        }
        return response()->json(['it works'=>'som dataaa']);
    }
}
