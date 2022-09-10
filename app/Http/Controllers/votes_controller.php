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
        if(Auth::user() and is_numeric($request->id)){
            if($request->type == 'up_vote'){
                $list = User::find(Auth::user()->id);
                $votes = json_decode($list->up_votes);
                if(in_array($request->id,$votes)){
                    array_splice($votes, array_search($request->id,$votes), 1);
                    DB::Table('posts')->whereid($request->id)->decrement('heat');
                }else{
                    array_push($votes, $request->id);
                    DB::Table('posts')->whereid($request->id)->Increment('heat');
                }
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->up_votes = $votes;
                $user->save();
                //return response()->json('succsess');
            }elseif($request->type == 'down_vote'){
                $list = User::find(Auth::user()->id);
                $votes = json_decode($list->down_votes);                
                if(in_array($request->id,$votes)){
                    array_splice($votes, array_search($request->id,$votes), 1);
                    DB::Table('posts')->whereid($request->id)->Increment('heat');
                }else{
                    array_push($votes, $request->id);
                    DB::Table('posts')->whereid($request->id)->decrement('heat');
                }
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->down_votes = $votes;
                $user->save();
                //return response()->json('succsess');
            }else{
                //return response()->json('failed beacause of manipilated html votes up down');
            }

        }else{
            //return response()->json('failed beacause of manipilated html is');
        }
    
    }
}