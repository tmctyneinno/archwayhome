<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        return view('admin.events.index');
    }

    public function create(){
        return view('admin.events.create');
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

        if ($numImages < 1 || $numImages > 7) {
            return redirect()->back()->withErrors(['images' => 'Please upload between 1 and 7 images.']);
        }
        
       
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('event'), $imageName);
                $imagePaths[] = 'event/' . $imageName;
            }
        }

        $event = new Event();
        $event->title = $validatedData['title'];
        $event->video_link = $validatedData['video_link'];
        $event->images = json_encode($imagePaths); 
        $event->save();

        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function edit($id){
        $event = Event::findOrFail(decrypt($id));
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

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
                $image->move(public_path('event'), $imageName);
                $imagePaths[] = 'event/' . $imageName;
            }
           
            // $currentImages = json_decode($event->images, true) ?? [];
            // $newImages = array_merge($currentImages, $imagePaths);
            $event->images = json_encode($imagePaths);
            }

        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $eventItem = Event::findOrFail(decrypt($id));
        if (!$eventItem) {
            return redirect()->back()->with('error', 'Event item not found.');
        }
        $eventItem->delete();
        return redirect()->back()->with('success', 'Event item deleted successfully.');
    }
}
