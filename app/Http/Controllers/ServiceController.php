<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
       
        return view('admin.service.index');
    }

    public function create(){
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            // 'icon_class' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('services'), $imageName);
        }
        
        Service::create(array_merge($validated, ['image' => 'services/'.$imageName]));
    
        return redirect()->route('admin.service.create')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail(decrypt($id));
        return view('admin.service.edit', compact('service'));
    } 

    public function update(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required',
            // 'icon_class' => 'required',
            'content' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:32768', 
        ]);
    
        // Find the service record by ID
        $service = Service::findOrFail($id);   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('services'), $imageName);
            
            $service->update(['image' =>  'services/' . $imageName]);
        } 
       
        $service->update([
            'title' => $request->title,
            // 'icon_class' => $request->icon_class,
            'content' => $request->content,
        ]);
    
        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }
    

    public function destroy($id)
    {
        $service= Service::findOrFail(decrypt($id));
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
    }
}
