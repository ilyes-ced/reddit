<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class InputBocComment extends Component
{
    public $post_id;
    public $main_text;
    public $add_comments=[];
    public function render()
    {
        //$data = Post::find($post_id);
        $this->comments = Comment::where('parent_comment_id',0)->where('post_id',$this->post_id)->get();

        return view('livewire.input-boc-comment');
    }

    public function create_comment(){
        $validator = $this->validate([
            'main_text' => 'required|string|min:0|max:500',
            'post_id' => 'required|integer|min:1|exists:posts,id'
        ]);

        $post_created = Comment::create([
            'content' => $this->main_text,
            'owner_id' => Auth::user()->id,
            'post_id' => $this->post_id,
            'parent_comment_id' => 0,

        ]);
        $this->main_text="";
        //array_push($this->add_comments ,Comment::latest()->first());
    }
}
