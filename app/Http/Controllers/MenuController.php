<?php

namespace App\Http\Controllers;

use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function creatMenu(){
        return view('admin.menu.create');
    }

    public function indexMenu(){
        $menuItems = MenuItem::with('dropdownItems')->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    public function storeMenu(Request $request){
        $this->validateMenu($request);
        $menuItem = MenuItem::create($request->only('name',));
        $menuItem['url'] = Str::slug($request->name);
        if ($request->has('dropdown_items')) {
            $this->createDropdownItems($menuItem, $request->dropdown_items);
        }
        return redirect()->route('admin.menu.create')->with('success', 'Menu item created successfully!');
    }

    public function editMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));
        return view('admin.menu.edit', compact('menuItem'));
    }

    public function updateMenu(Request $request, $id)
    {
        $this->validateMenu($request);
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update($request->only('name'));
        $menuItem->dropdownItems()->delete();
        if ($request->has('dropdown_items')) {
            $this->createDropdownItems($menuItem, $request->dropdown_items);
        }
        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully!');
    }
    
    public function destroyMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));
        $menuItem->dropdownItems()->delete();
        $menuItem->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully!');
    }

    public function projectMenu(){
        return view('admin.projects.projectMenu');
    } 

    public function storeProjectMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048', 
        ]);
    
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('projectType'), $imageName);
    
        ProjectMenu::create([
            'name' => $request->name,
            'image' => 'projectType/'.$imageName,
        ]);
    
        return back()->with('addProjectMenu', 'Your Project Menu has been added.');
    }
    

    public function editProjectMenu($id){
        $decrypted = decrypt($id);
        $projectMenu = ProjectMenu::findOrFail($decrypted);
        return view('admin.projects.projectMenuEdit', compact('projectMenu'));
    }

   

    public function updateProjectMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $existingMenu = ProjectMenu::where('name', $request->name)->first();

        if ($existingMenu && $existingMenu->image) {
            // Delete the existing image file
            $imagePath = public_path($existingMenu->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Upload new image
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('projectType'), $imageName);

        if ($existingMenu) {
        
            $existingMenu->update([
                'name' => $request->name,
                'image' => 'projectType/'.$imageName,
            ]);
        } else {
        
            ProjectMenu::create([
                'name' => $request->name,
                'image' => 'projectType/'.$imageName,
            ]);
        }

        return back()->with('success', 'Project Menu updated successfully.');
    }


    public function destroyProjectMenu($id)
    {
       
        $projectMenu = ProjectMenu::findOrFail(decrypt($id));
        $projectMenu->delete();

        return redirect()->route('admin.project.projectMenu')->with('success', 'Project Menu deleted successfully.');
    }

}
