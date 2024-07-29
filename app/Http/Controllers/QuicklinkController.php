<?php

namespace App\Http\Controllers;
use App\Models\QuickLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuicklinkController extends Controller
{
    public function create(){
     
        return view('admin.quicklink.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $quickLinkData = $request->only(['name']);
        // Generate slug from the name
        $quickLinkData['slug'] = Str::slug($request->name); 
       
    
        QuickLink::create($quickLinkData);
    
        return redirect()->route('admin.quicklink.create')
                         ->with('success', 'Quicke link created successfully.');
    }

    public function edit($id){
        $quickLink = QuickLink::findOrFail(decrypt($id));
        return view('admin.quicklink.edit', compact('quickLink'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        $quickLink = QuickLink::findOrFail($id);
        $quickLink->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $quickLink = QuickLink::findOrFail(decrypt($id));
        $quickLink->delete();

        return redirect()->route('admin.settings.content')
                         ->with('success', 'Data deleted successfully.');
    }
}
