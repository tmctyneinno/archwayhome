<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\DropdownItem;
use App\Models\Slider;
use App\Http\Traits\AdminTrait;
use Exception;

class SliderController extends Controller
{
    use AdminTrait;
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    { 
       
        return view('admin.users.index', [
            'bheading' => 'Index',
            'breadcrumb' => 'Index',
        ]);
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
      
        try{
            $this->validateSlider($request); 
            $imagePath = $this->uploadImageSlider($request->image);
            
            Slider::create(array_merge($request->only([
                'title', 'caption', 
            ]), ['image' => $imagePath]));

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.slider.index')->with('error', 'Slider creation failed. ' . $e->getMessage());
        }
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
            $slider->image = $imagePath; 
        }

        $slider->update($request->only(['title', 'caption']));

        if ($request->hasFile('image')) {
            $slider->save();
        }

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }
 
    protected function validateSlider(Request $request, $isCreate)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
        ];

        if ($isCreate) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $request->validate($rules);
    }

    public function destroySlider($slider)
    {
        $slider = Slider::findOrFail(decrypt($slider));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

   
}
