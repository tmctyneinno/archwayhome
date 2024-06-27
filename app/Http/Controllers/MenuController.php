<?php

namespace App\Http\Controllers;

use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use App\Models\MenuItem;

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
        $menuItem = MenuItem::create($request->only('name', 'url'));
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
        $menuItem->update($request->only('name', 'url'));
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

    public function storeProjectMenu(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        ProjectMenu::create($request->all());
        return back()->with('addProjectMenu', 'Your Project Meun has been added.');
    }

    public function editProjectMenu($id){
        $decrypted = decrypt($id);
        $projectMenu = ProjectMenu::findOrFail($decrypted);
        return view('admin.projects.projectMenuEdit', compact('projectMenu'));
    }

    public function updateProjectMenu(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $projectMenu = ProjectMenu::findOrFail($id);
        $projectMenu->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.project.projectMenu')->with('success', 'Project Menu updated successfully.');
    }

    public function destroyProjectMenu($id)
    {
       
        $projectMenu = ProjectMenu::findOrFail(decrypt($id));
        $projectMenu->delete();

        return redirect()->route('admin.project.projectMenu')->with('success', 'Project Menu deleted successfully.');
    }

}
