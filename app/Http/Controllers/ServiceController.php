<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
       
        return view('admin.service.index', compact('services'));
    }

    public function create(){
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'content' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postIcons'), $imageName);

            $validated['icon'] = 'postIcons/' . $imageName;
        }

        Service::create($validated);
        return redirect()->route('admin.service.create')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        // dd($id);
        $service = Service::findOrFail(decrypt($id));
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'content' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
    
        // Find the service record by ID
        $service = Service::findOrFail($id);
    
       
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {

            if ($service->icon && file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
    
            // Upload new image
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postIcons'), $imageName);
            $validated['icon'] = 'postIcons/' . $imageName;
        }
    
        $service->update($validated);
    
    
        return redirect()->route('admin.service.index', $id)->with('success', 'Service updated successfully.');
    }
    

    public function destroy($id)
    {
        $service= Service::findOrFail(decrypt($id));
        $service->delete();
        return redirect()->route('admin.post.index')->with('success', 'Service deleted successfully.');
    }
}
