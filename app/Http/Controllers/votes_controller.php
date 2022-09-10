<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class Votes_controller extends Controller
{
    public function index(Request $request)
    { 
        
        if(Auth::user()){
            if($request->type == 'up_vote'){
                DB::Table('posts')->whereid($request->id)->Increment('heat');
                $list = User::find(Auth::user()->id);
                $votes = json_decode($list->up_votes);
                array_push($votes, $request->id);
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->up_votes = $votes;
                $user->save();
                return response()->json('succsess');
            }elseif($request->type == 'down_vote'){
                DB::Table('posts')->whereid($request->id)->decrement('heat');
                $list = User::find(Auth::user()->id);
                $votes = json_decode($list->down_votes);
                array_push($votes, $request->id);
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->down_votes = $votes;
                $user->save();
                return response()->json('succsess');
            }else{
            }

            return response()->json('failure');
        }
    
    }
}