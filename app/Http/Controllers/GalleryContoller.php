<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryContoller extends Controller
{
    public function index(){
        return view('admin.gallery.index');
    }

    public function create(){
        return view('admin.gallery.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:32768',
        ]);
    
        $teamData = $request->only(['title']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('gallery'), $imageName);
            $teamData['images'] = 'gallery/'.$imageName;
        }
    
        Gallery::create($teamData);

        return redirect()->back()->with('success', 'Gallery added successfully.');

    }

    public function edit($id){
        $gallery = Gallery::findOrFail(decrypt($id));
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request){
        return view('admin.gallery.create');
    }

}
