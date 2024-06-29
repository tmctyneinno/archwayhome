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
    
        $teamData = $request->only(['name']);
        // Generate slug from the name
        $teamData['slug'] = Str::slug($request->name); 
       
    
        QuickLink::create($teamData);
    
        return redirect()->route('admin.quicklink.create')
                         ->with('success', 'Quicke link created successfully.');
    }
}
