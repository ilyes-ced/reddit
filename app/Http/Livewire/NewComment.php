<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;


class NewComment extends Component
{
    public $new_comment = "";
    public function render()
    {        
        $this->new_comment = Comment::latest()->first();
        return view('livewire.new-comment');
    }
}
