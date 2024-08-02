<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingsTrait;
use App\Models\ContactUs;
use App\Models\ExecutiveSummary;
use App\Models\OfficeHours;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\AboutUs;
use Illuminate\Validation\ValidationException; 
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends Controller
{
    use SettingsTrait;
    public function WhyChooseUs(){ 
        return view('admin.settings.index');
    }

    public function storeWhyChooseUs(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'why_choose_us' => 'required|string',
                'mission' => 'required|string',
                'vision' => 'required|string',
                'core_value' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('whyChooseUsImage'), $imageName);
            }
    
            WhyChooseUs::create([
                'why_choose_us_statements' => $validatedData['why_choose_us'],
                'mission' => $validatedData['mission'],
                'vision' => $validatedData['vision'],
                'core_values' => $validatedData['core_value'],
                'image' => 'whyChooseUsImage/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Why Choose Us statement added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Why Choose Us statement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function updateWhyChooseUs(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'why_choose_us' => 'required|string',
                'mission' => 'required|string',
                'vision' => 'required|string',
                'core_value' => 'required', 
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $whyChooseUs = WhyChooseUs::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('whyChooseUsImage'), $imageName);
                
                $whyChooseUs->update(['image' =>  'whyChooseUsImage/' . $imageName]);
            } 
    
            $whyChooseUs->update([
                'why_choose_us_statements' => $validatedData['why_choose_us'],
                'mission' => $validatedData['mission'],
                'vision' => $validatedData['vision'],
                'core_values' => $validatedData['core_value'],
            ]);
    
            return redirect()->back()->with('success', 'Why Choose Us statement updated successfully.');
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

    public function getAboutUs(Request $request){
        return view('admin.settings.aboutUs.index');
    }
    public function storeAboutUs(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        
        $imagePath = $this->uploadImageAboutUs($request, 'image', 'aboutUsImages');
        $headerImagePath = $this->uploadHeaderImageAboutUs($request, 'header_image', 'aboutUsImages');
        AboutUs::create(array_merge($validated, 
        [
            'image' => $imagePath,
            'header_image' => $headerImagePath
        ]
        ));

        return redirect()->back()->with([
            'successAboutus' => 'About us created successfully.',
            'active_tab' => 'v-pills-profile' 
        ]);
        //  return redirect()->route('admin.settings.content')->with('success', 'Data created successfully.');
   
    }

    public function updateAboutUs(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $aboutUs = AboutUs::findOrFail($id);
       
        $this->handleUpdateAboutUsImage($request, $aboutUs);
        $aboutUs->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
 
        return redirect()->back()->with([
            'success' => 'About us updated successfully.',
        ]);
    } 

    public function getContactUs(Request $request){
        return view('admin.settings.contactUs.index');
    }

    public function storeContactUs(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'website_link' => 'string',
            'first_phone' => 'required|string',
            'second_phone' => '',
            'first_email' => 'required|email',
            'second_email' => '',
            'first_address' => 'required|string',
            'second_address' => '',
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('contactUsImages'), $imageName);
            $validated['site_logo'] = 'contactUsImages/' . $imageName;
        }

        ContactUs::create($validated);

        return redirect()->back()->with('success', 'Contact us created successfully.');
    }
 
    public function updateContactUs(Request $request, $id)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'website_link' => 'string',
            'first_phone' => 'required|string',
            'second_phone' => '',
            'first_email' => 'required|email',
            'second_email' => '',
            'first_address' => 'required|string',
            'second_address' => '',
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        $contactUs = ContactUs::findOrFail($id);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('contactUsImages'), $imageName);

            // Delete old site_logo file if exists
            if ($contactUs->site_logo) {
                $oldImagePath = public_path($contactUs->site_logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $contactUs->site_logo = 'contactUsImages/' . $imageName;
        }

        $contactUs->company_name = $validated['company_name'];
        $contactUs->first_phone = $validated['first_phone'];
        $contactUs->second_phone = $validated['second_phone'];
        $contactUs->first_email = $validated['first_email'];
        $contactUs->second_email = $validated['second_email'];
        $contactUs->first_address = $validated['first_address'];
        $contactUs->second_address = $validated['second_address'];
        $contactUs->website_link = $validated['website_link'];

        $contactUs->save();

        return redirect()->back()->with('success', 'Contact us updated successfully.');
    }

    public function storeExecutiveSummary(Request $request){
        $validated = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        
        $imagePath = $this->uploadImageExecutiveSummary($request, 'image', 'executiveSummaryImage');
        ExecutiveSummary::create(array_merge($validated, 
        [
            'image' => $imagePath,
        ]
        ));

        return redirect()->back()->with([
            'successAboutus' => 'Executive Summarysuccessfully.',
            'active_tab' => 'v-pills-profile' 
        ]);
        //  return redirect()->route('admin.settings.content')->with('success', 'Data created successfully.');
   
    }

    public function updateExecutiveSummary(Request $request, $id){
        $validated = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $executiveSummary = ExecutiveSummary::findOrFail($id);
       
        $this->handleUpdateExecutiveSummaryImage($request, $executiveSummary);
        $executiveSummary->update([
            'content' => $validated['content'],
        ]);
 
        return redirect()->route('admin.settings.content')->with([
            'success' => 'Executive Summary updated successfully.',
        ]);
    }
 
    public function indexOfficeHours(Request $request){
        return view('admin.settings.officeHours.index');
    }

    public function storeOfficeHours(Request $request){
        $validated = $request->validate([ 
            'content' => 'required',
        ]);
        
        OfficeHours::create($validated);
        return redirect()->back()->with('success', 'Office Hours created successfully.');
   
    }

    public function updatestoreOfficeHours(Request $request, $id){
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $officeHours = OfficeHours::findOrFail($id);
       
        $officeHours->update([
            'content' => $validated['content'],
        ]);
 
        return redirect()->back()->with([
            'success' => 'Office Hours updated successfully.',
        ]);
    }
}
