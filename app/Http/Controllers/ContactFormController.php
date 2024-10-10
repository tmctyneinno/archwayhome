<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Http;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{ 
    public function index(){
        return view('admin.contact.index');
    }

   

    public function store(Request $request)
    {
        // Validate form input along with reCAPTCHA
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|string|email|max:30',
            'phone' => 'required|string|max:20',
            'comments' => 'required|max:255',
            'g-recaptcha-response' => 'required', 
        ]);
    
        // Check if form validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Validate reCAPTCHA token
        $recaptcha = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secretKey'), // Ensure secret key is set in services config
            'response' => $recaptcha,
            'remoteip' => $request->ip(), // Use the user's IP address for better validation
        ]);
    
        $recaptchaData = $response->json(); // Get response data
        $recaptcha_success = $recaptchaData['success'] ?? false; // Check if reCAPTCHA succeeded
    
        // If reCAPTCHA validation fails
        if (!$recaptcha_success) {
            return redirect()->back()->withInput()->withErrors(['recaptcha' => 'Please verify that you are not a robot.']);
        }
    
        // If validation and reCAPTCHA are successful, save the form data
        $contactMessage = new Contact([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'comments' => $request->input('comments'),
        ]);
        $contactMessage->save();
    
        return redirect()->back()->with('success', 'Message sent successfully');
    }
    
    


    public function show($id){
        $contact = Contact::findOrFail(decrypt($id));
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::find(decrypt($id));

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact us Form data not found.');
        }

        $contact->delete();

        return redirect()->back()->with('success', 'Contact us Form data deleted successfully.');
    }
}
