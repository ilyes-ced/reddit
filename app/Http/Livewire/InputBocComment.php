<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class InputBocComment extends Component
{
    //protected $listeners = ['change-p' => 'change_parent'];
    public $post_id;
    public $main_text;
    public $main_text_sub;
    public $parent_comment_id_live;
    public $comments;
    public function render()
    {
        //$data = Post::find($post_id);
        $this->comments = Comment::where('parent_comment_id',0)->where('post_id',$this->post_id)->get();
        return view('livewire.input-boc-comment', ['comments' => $this->comments]);
    }

    public function create_comment(){
        if(Auth::user()){
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

            //$this->emit('refresh_comp');
        }else{
            return redirect('/login');
        }
    }
    public function create_sub_comment(){
        error_log('zrijrgbzoiurgbieqrugbesiurgboestugboeqgr');
        error_log($this->main_text_sub);
        error_log($this->post_id);
        error_log($this->parent_comment_id_live);
    }

    public function change_parent(){
        error_log($this->parent_comment_id_live);
        error_log($this->main_text_sub);
        error_log($this->post_id);
        error_log($this->parent_comment_id_live);
    }
}
