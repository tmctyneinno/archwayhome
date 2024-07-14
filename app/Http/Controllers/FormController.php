<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Inspection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'comments' => 'nullable|string',
        ]);

        // Store the validated data to the database
        $contact = new Contact(); // Replace with your model name if using one
        $contact->fill($request->all());
        $contact->save();

        // Optionally, redirect somewhere after successful submission
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

   

  
   

}
