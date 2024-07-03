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
            'icon_class' => 'required',
            'content' => 'required',
        ]);

       

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
            'icon_class' => 'required',
            'content' => 'required',
        ]);
    
        // Find the service record by ID
        $service = Service::findOrFail($id);    
        $service->update($validated);
    
        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }
    

    public function destroy($id)
    {
        $service= Service::findOrFail(decrypt($id));
        $service->delete();
        return redirect()->route('admin.post.index')->with('success', 'Service deleted successfully.');
    }
}
