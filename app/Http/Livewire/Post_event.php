<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Sub;
use App\Models\User;

class Post_event extends Component
{
    public $modal_bool = false;
    protected $listeners = ['open_modal'];
    public function render()
    {   
        $data = array();
        //$count = Post::count();
        $post = Post::paginate(10);
        $count =  count($post);
        
        for ($i = 1; $i <= $count-1; $i++) {
            
            array_push($data,$post[$i]);
            if(!isset($sub_data[$post[$i]->sub_id])){
                $sub_data[$post[$i]->sub_id] = Sub::where('id',$post[$i]->sub_id)->first();
            }
            if(!isset($user_data[$post[$i]->owner_id])){
                $user_data[$post[$i]->owner_id] = User::where('id',$post[$i]->sub_id)->first();;
            }
        }
        
        return view('livewire.post')->with('data',$data)->with('subs_data',$sub_data)->with('user_data',$user_data);
        
    }



    public function open_modal()
    {
        $this->modal_bool=true;
    }
}
