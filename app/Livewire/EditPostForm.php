<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPostForm extends Component
{
    use WithFileUploads;

   
    public $post;
    public $title;
    public $content;
    public $image;

    public function mount($postId){
        $this->post = Post::find($postId);

        if (!$this->post) {
            return redirect()->route('getposts')->with('error', 'Post not found');
        }

        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->image = $this->post->image;

    }


    public function updatepost(){
        
        $this->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $imagePath = $this->post->image;

        if ($this->image && !is_string($this->image)) {
            $this->validate([
                'image' => 'mimes:jpg,png|max:2048',
            ]);
    
            $imagePath = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
    
            if ($this->post->image) {
                $oldImagePath = public_path('storage/' . $this->post->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); 
                }
            }
        } else {
            $imagePath = $this->post->image;
        }
    
        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath ? 'images/' . basename($imagePath) : $this->post->image, 
        ]);
    
        return redirect(route('getposts'))->with('success', 'post updated successfully');
        }

    public function render()
    {
        return view('livewire.edit-post-form');
    }
}
