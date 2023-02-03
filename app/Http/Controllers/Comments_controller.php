<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;
use DB;

class Comments_controller extends Controller
{
    public function create_comment(Request $request)
    {
        

        
        if(isset($request->parent_comment)){
            $validator = $request->validate([
                'main_text' => 'required|string|min:0|max:500',
                'post_id' => 'required|integer|min:1|exists:posts,id',
                'parent_comment' => 'required|integer|min:1|exists:comments,id'
            ]);

            $post_created = Comment::create([
                'content' => $request->main_text,
                'owner_id' => Auth::user()->id,
                'post_id' => $request->post_id,
                'parent_comment_id' => $request->parent_comment,

            ]);
        return('succ');
        }else{
            $validator = $request->validate([
                'main_text' => 'required|string|min:0|max:500',
                'post_id' => 'required|integer|min:1|exists:posts,id'
            ]);

            $post_created = Comment::create([
                'content' => $request->main_text,
                'owner_id' => Auth::user()->id,
                'post_id' => $request->post_id,
                'parent_comment_id' => 0,

            ]);
        return('succ');
        }
        //tempo
        //return redirect()->back();
    }


    public function vote_comment(Request $request)
    {
        //return($request->all());
        
        if(Auth::user() and is_numeric($request->id)){
            if($request->type == 'up_vote_comment'){
                $list = Auth::user();
                $votes = json_decode($list->up_votes_comments);
                if(in_array($request->id,$votes)){
                    array_splice($votes, array_search($request->id,$votes), 1);
                    DB::Table('comments')->whereid($request->id)->decrement('heat');
                }else{
                    array_push($votes, $request->id);
                    DB::Table('comments')->whereid($request->id)->Increment('heat');
                }
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->up_votes_comments = $votes;
                $user->save();
                return ('succsess1');

            }elseif($request->type == 'up_vote_comment'){
                $list = Auth::user();
                $votes = json_decode($list->down_votes_comments);                
                if(in_array($request->id,$votes)){
                    array_splice($votes, array_search($request->id,$votes), 1);
                    DB::Table('comments')->whereid($request->id)->Increment('heat');
                }else{
                    array_push($votes, $request->id);
                    DB::Table('comments')->whereid($request->id)->decrement('heat');
                }
                $votes = json_encode($votes);
                $user = User::find(Auth::user()->id);
                $user->down_votes_comments = $votes;
                $user->save();
                return ('succsess2');
            }else{
                return('gergerg');
            }

        }else{
            return('fgeg57469');
        }
    
    }
    
    public function reply_comment(Request $request){
        dd('fffffff');
    }

}
