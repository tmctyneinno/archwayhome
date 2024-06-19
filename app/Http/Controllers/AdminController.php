<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\DropdownItem;
use App\Models\Slider;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        // return view('admin.index', compact('admin'));
        return view('admin.users.index')
        ->with('bheading', 'Index')
        ->with('admin', 'admin')
        ->with('breadcrumb', 'Index');
    }

    public function creatMenu(){
        return view('admin.menu.create')
        ->with('bheading', 'Add Menu')
        ->with('breadcrumb', 'Index');
    }

    public function indexMenu(){
        $menuItems = MenuItem::with('dropdownItems')->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    public function storeMenu(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'dropdown_items.*' => 'nullable|string|max:255',
        ]);

        $menuItem = MenuItem::create([
            'name' => $request->name,
            'url' => $request->url
        ]);

        if ($request->has('dropdown_items')) {
            foreach ($request->dropdown_items as $dropdownItem) {
                $menuItem->dropdownItems()->create(['name' => $dropdownItem]);
            }
        }
        $request->session()->flash('success', 'Menu item created successfully!');
        return redirect()->route('admin.menu.create');
    }

    public function editMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));
        return view('admin.menu.edit', compact('menuItem'));
    }

    public function updateMenu(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'dropdown_items.*' => 'nullable|string|max:255',
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update([
            'name' => $request->name,
            'url' => $request->url
        ]);

        
        $menuItem->dropdownItems()->delete();
        if ($request->has('dropdown_items')) {
            foreach ($request->dropdown_items as $dropdownItem) {
                $menuItem->dropdownItems()->create(['name' => $dropdownItem]);
            }
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

    public function indexSlider(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function createSlider(){
       
        return view('admin.slider.create');
    }

    public function storeSlider(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'additional_text' => 'required|string|max:255',
            'button_url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('sliderImages'), $imageName);

        Slider::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'additional_text' => $request->additional_text,
            'button_url' => $request->button_url,
            'image' => 'sliderImages/'.$imageName,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
    }

    public function editSlider($slider)
    {
        $slider = Slider::findOrFail(decrypt($slider));
        return view('admin.slider.edit', compact('slider'));
    }

    public function updateSlider(Request $request, $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'additional_text' => 'required|string|max:255',
            'button_url' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $slider = Slider::findOrFail($slider);
        if ($request->hasFile('image')) {
            
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('sliderImages'), $imageName);
            $slider->update([
                'image' => 'sliderImages/'.$imageName,
            ]);
        }

        $slider->update([
            'title' => $request->title,
            'caption' => $request->caption,
            'additional_text' => $request->additional_text,
            'button_url' => $request->button_url,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroySlider($slider)
    {
        $slider = Slider::findOrFail(decrypt($slider));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

}
