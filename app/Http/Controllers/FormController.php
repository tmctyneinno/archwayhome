<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Inspection;
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

    public function submitInspection(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'project' => 'required|string',
            'inspectionDate' => 'required|date',
        ]);

        $inspection = new Inspection();

        $inspection->full_name = $request->input('full_name');
        $inspection->email = $request->input('email');
        $inspection->phone = $request->input('phone');
        $inspection->project = $request->input('project');
        $inspection->inspection_date = $request->input('inspectionDate');

        $inspection->save();

        return response()->json(['success' => true]);
    }
}
