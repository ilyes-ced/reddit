<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Pages_controller extends Controller
{
    public function up_vote($id)
    {   
        DB::Table('posts')->whereid($id)->Increment('heat');

    }

    public function down_vote($id)
    {
        DB::Table('posts')->whereid($id)->decrement('heat');
    }
}
