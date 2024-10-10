<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoreValue;

class CoreValueController extends Controller
{
    public function index(){ 
        return view('admin.settings.coreValue.index');
    }

    public function storeCoreValue(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'mission' => 'required|string',
                'vision' => 'required|string',
                'core_value' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('coreValue'), $imageName);
            }
    
            CoreValue::create([
                'mission' => $validatedData['mission'],
                'vision' => $validatedData['vision'],
                'core_values' => $validatedData['core_value'],
                'image' => 'coreValue/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Core value statement added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Core value statement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function updateCoreValue(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'mission' => 'required|string',
                'vision' => 'required|string',
                'core_value' => 'required', 
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $coreValue = CoreValue::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('coreValue'), $imageName);
                
                $coreValue->update(['image' =>  'coreValue/' . $imageName]);
            } 
    
            $coreValue->update([
                'mission' => $validatedData['mission'],
                'vision' => $validatedData['vision'],
                'core_values' => $validatedData['core_value'],
            ]);
    
            return redirect()->back()->with('success', 'Core value statement updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Record not found. Please try again.')->withInput();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1]; 
    
            if ($errorCode === 1062) {
                return redirect()->back()->with('error', 'Duplicate entry. Please provide unique values.')->withInput();
            } else {
                return redirect()->back()->with('error', 'Database error: ' . $e->getMessage())->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.')->withInput();
        }
    }


}
