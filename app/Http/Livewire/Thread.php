<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Thread_model;
use App\Models\Sub;

class Thread extends Component
{
    public function render()
    {   

        $data = Thread_model::take(15)->get();

        foreach ($data as $item){
            $users[$item->owner_id]= User::where('id',$item->owner_id)->pluck('username')->first();
            $subs[$item->sub] = Sub::where('id',$item->sub)->pluck('name')->first();
        }

        return view('livewire.thread')->with('data',$data)->with('user_data',$users)->with('subs_data',$subs);
    }
}
