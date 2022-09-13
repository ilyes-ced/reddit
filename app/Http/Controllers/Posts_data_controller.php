<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class Posts_data_controller extends Controller
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


    public function bookmarks(Request $request){
        if(!Auth::user()){
            return('redirect_to_login');
        }
        
        $var = json_decode(Auth::user()->bookmarks);
        if(array_search($request->id,$var)){
            array_splice($var, array_search($request->id,$var), 1);
        }else{   
            array_push($var,$request->id); 
        }        


        error_log(json_encode($var));
        User::find(Auth::user()->id)->update(['bookmarks',json_encode($var)]);
        error_log('Some 2222222222222 here.');
    }




}