<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Post; 

class BlogController extends Controller
{
    public function index(){
        // $posts = Post::latest()->get();
        return view('admin.blog.index');
    }

    public function createPost(){
        return view('admin.blog.create');
    }

    public function storePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('postImages'), $imageName);
        }
    
        Post::create(array_merge($validated, ['image' => 'postImages/'.$imageName]));
    
        return redirect()->route('admin.post.create')->with('success', 'Post created successfully.');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail(decrypt($id));
        return view('admin.blog.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', 
        ]);
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('postImages'), $imageName);
            
            $post->update(['image' =>  'postImages/' . $imageName]);
        }
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.post.index')->with('success', 'Post updated successfully.');
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail(decrypt($id));
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully.');
    }

    

}
