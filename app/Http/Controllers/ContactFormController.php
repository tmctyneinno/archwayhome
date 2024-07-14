<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Http;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index(){
        return view('admin.contact.index');
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'comments' => 'required|string',
            'g-recaptcha-response'=> 'required',
        ],);
        
        $recaptcha = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secretKey'),
            'response' => $recaptcha,
            'remoteip' => \request()->ip()
        ]);
        // dd($response->json());
        $recaptcha_success = $response['success'];

        if (!$recaptcha_success) {
            return redirect()->back()->withErrors(['recaptcha' => 'Please verify that you are not a robot.']);
        }

        Contact::create($validated);
        return redirect()->back()->with('success', 'Contact Form Submitted successfully.');

        // return response()->json([
        //     'success' => true,
        //     'message' => "Contact us form submitted successfully",
        // ]);
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
