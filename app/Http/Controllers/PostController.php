<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //

    public function getPosts(){

        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(3);
        //dd(vars: $posts);
        return view('posts.list', compact('posts'));
    }
    public function showcreateForm(){
        return view('posts.createpost');
    }


  
   



    public function storenewpost(Request $request){


        $validated = $request->validate([
            'title' => 'required|max:255|unique:posts',
            'content' => 'required',
            'image' => 'nullable|mimes:jpg,png|max:2048'
        ]);


        $imagePath=null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            // dd($file);
            $imagePath = $file->storeAs('images', $file->getClientOriginalName(), 'public');

        }
        //dd($imagePath);

        $user = Auth::user();
        $user_id = $user->id;

        Post::create([
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'user_id'=>$user_id,
            'image'=>$imagePath
        ]);

        return redirect()->back()->with('success', 'post created successfully');

    }

    public function deletePost($id){
        $post = Post::findOrFail($id);
        if ($post->image) {
            $imagePath = public_path('storage/' . $post->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath); 
            }
        }
        $post->delete();
        return redirect()->route('getposts')->with('success', 'Post deleted successfully');
    }

    public function displayPost($id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('getposts')->with('error', 'Post not found');
        }

        return view('posts.show', compact('post'));
    }


}
