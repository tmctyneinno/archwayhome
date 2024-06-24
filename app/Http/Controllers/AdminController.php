<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\DropdownItem;
use App\Models\Slider;
use App\Http\Traits\AdminTrait;

class AdminController extends Controller
{
    use AdminTrait;
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.users.index', [
            'bheading' => 'Index',
            'admin' => $admin,
            'breadcrumb' => 'Index',
        ]);
    }

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

    public function indexSlider(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function createSlider(){
        return view('admin.slider.create');
    }

    public function storeSlider(Request $request)
    {
        $this->validateSlider($request);
        $imagePath = $this->uploadImageSlider($request->image);
       
        Slider::create(array_merge($request->only([
            'title', 'caption', 'additional_text', 'button_url', 'button_text'
        ]), ['image' => $imagePath]));

        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
    }

    public function editSlider($id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        return view('admin.slider.edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
       
        $this->validateSlider($request, false);
        $slider = Slider::findOrFail($id);
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImageSlider($request->image);
            $slider->update(['image' => $imagePath]);
        }
 
        $slider->update($request->only([
            'title', 'caption', 'additional_text', 'button_url', 'button_text'
        ]));

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroySlider($slider)
    {
        $slider = Slider::findOrFail(decrypt($slider));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

   
}
