<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sub;
use DB;
use Illuminate\Support\Facades\Auth;



class Users_controller extends Controller
{
    public function join_leave(Request $request)
    {        
        $user = User::find(Auth::user()->id); 
        $my_subs = json_decode($user->joined_subs);
        if(in_array($request->id,$my_subs)){
            array_splice($my_subs, array_search($request->id,$my_subs), 1);                    
            DB::Table('subs')->whereid($request->id)->decrement('number_of_members');
        }else{   
            array_push($my_subs,$request->id); 
            DB::Table('subs')->whereid($request->id)->Increment('number_of_members');
        }        
        $sus = User::find(Auth::user()->id);
        $sus->joined_subs = json_encode($my_subs);
        $sus->save();
    }

    public function join_leave_auth(Request $request)
    {       
        dd($request->all());
    }
}
