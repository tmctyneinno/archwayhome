<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingsTrait;
use App\Models\ContactUs;
use App\Models\Sociallink;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\AboutUs;

class SettingsController extends Controller
{
    use SettingsTrait;
    public function WhyChooseUs(){
        return view('admin.settings.index');
    }

    public function storeWhyChooseUs(Request $request)
    {
        $validatedData = $request->validate([
            'why_choose_us' => 'required|string',
            'mission' => 'required|string',
            'vision' => 'required|string',
            'core_value' => 'required|string',
        ]);

        WhyChooseUs::create([
            'why_choose_us_statements' => $validatedData['why_choose_us'],
            'mission' => $validatedData['mission'],
            'vision' => $validatedData['vision'],
            'core_values' => $validatedData['core_value'],
        ]);

        return redirect()->back()->with('success', 'Why Choose Us statement added successfully.');
    }

    public function updateWhyChooseUs(Request $request, $id)
    {
        $validatedData = $request->validate([
            'why_choose_us' => 'required|string',
            'mission' => 'required|string',
            'vision' => 'required|string',
            'core_value' => 'required|string',
        ]);

        $whyChooseUs = WhyChooseUs::findOrFail($id);

        $whyChooseUs->update([
            'why_choose_us_statements' => $validatedData['why_choose_us'],
            'mission' => $validatedData['mission'],
            'vision' => $validatedData['vision'],
            'core_values' => $validatedData['core_value'],
        ]);

        return redirect()->back()->with('success', 'Why Choose Us statement updated successfully.');
    }

    public function storeAboutUs(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        
        $imagePath = $this->uploadImageAboutUs($request, 'image', 'aboutUsImages');
        AboutUs::create(array_merge($validated, ['image' => $imagePath]));

        return redirect()->route('admin.settings.content')->with([
            'successAboutus' => 'Data created successfully.',
            'active_tab' => 'v-pills-profile' 
        ]);
        //  return redirect()->route('admin.settings.content')->with('success', 'Data created successfully.');
   
    }

    public function updateAboutUs(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $aboutUs = AboutUs::findOrFail($id);
       
        $this->handleUpdateAboutUsImage($request, $aboutUs);
        $aboutUs->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
 
        return redirect()->route('admin.settings.content')->with([
            'success' => 'Data updated successfully.',
        ]);
    }

    public function storeContactUs(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'first_phone' => 'required|string',
            'second_phone' => 'required|string',
            'first_email' => 'required|email',
            'second_email' => 'required|email',
            'first_address' => 'required|string',
            'second_address' => 'required|string',
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('contactUsImages'), $imageName);
            $validated['site_logo'] = 'contactUsImages/' . $imageName;
        }

        ContactUs::create($validated);

        return redirect()->route('admin.settings.content')->with('success', 'Contact us created successfully.');
    }
 
    public function updateContactUs(Request $request, $id)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'first_phone' => 'required|string',
            'second_phone' => 'required|string',
            'first_email' => 'required|email',
            'second_email' => 'required|email',
            'first_address' => 'required|string',
            'second_address' => 'required|string',
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

        $contactUs->save();

        return redirect()->route('admin.settings.content')->with('success', 'Contact us updated successfully.');
    }


    public function storeSocialLinks(Request $request){
        $data = $request->validate([
            'facebook' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'linkedin' => 'required|string',
            'youtube' => 'required|string',
        ]);

        Sociallink::create($data);
        return redirect()->route('admin.settings.content')->with('success', 'Social Link created successfully.');
    }

    public function updateSocialLinks(Request $request, $id)
    {
        $data = $request->validate([
            'facebook' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'linkedin' => 'required|string',
            'youtube' => 'required|string',
        ]);
        $socialLink = Sociallink::findOrFail($id);
        $socialLink->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Social Link updated successfully.');
    }
}
