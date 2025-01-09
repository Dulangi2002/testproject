<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    public $posts;
    
    public function render()
    {
        $posts=Post::latest()->paginate(3);
        //dd($posts);
        return view('livewire.post-list',['posts'=>$posts]);
    }
}
