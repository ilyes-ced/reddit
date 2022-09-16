<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class LoadMore extends Component
{
  
    public $limitPerPage = 5;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
   
    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }
    public function render()
    {
        $posts = Post::orderByDesc('id')->paginate($this->limitPerPage);
        $this->emit('userStore');
        return view('livewire.load-more', ['post' => $posts]);
    }
}
