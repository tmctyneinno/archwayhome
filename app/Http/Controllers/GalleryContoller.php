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
        //  dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'video_link' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
       
        $images = $request->file('images');
        $numImages = count($images);

        if ($numImages < 3 || $numImages > 7) {
            return redirect()->back()->withErrors(['images' => 'Please upload between 3 and 7 images.']);
        }
        
       
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('gallery'), $imageName);
                $imagePaths[] = 'gallery/' . $imageName;
            }
        }

        $event = new Gallery();
        $event->title = $validatedData['title'];
        $event->video_link = $validatedData['video_link'];
        $event->images = json_encode($imagePaths); 
        $event->save();

        return redirect()->back()->with('success', 'Gallery created successfully.');
    }

    public function edit($id){
        $gallery = Gallery::findOrFail(decrypt($id));
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $event = Gallery::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'video_link' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $event->title = $validatedData['title'];
        $event->video_link = $validatedData['video_link'];

        
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagePaths = [];

            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('gallery'), $imageName);
                $imagePaths[] = 'gallery/' . $imageName;
            }
           
            $event->images = json_encode($imagePaths);
            }

        $event->save();

        return redirect()->back()->with('success', 'Projects status updated successfully.');
    }
    public function destroy($id)
    {
        $projectsStatusItem = Gallery::find(decrypt($id));

        if (!$projectsStatusItem) {
            return redirect()->back()->with('error', 'Projects status item not found.');
        }

        $projectsStatusItem->delete();

        return redirect()->back()->with('success', 'Projects status item deleted successfully.');
    }

}
