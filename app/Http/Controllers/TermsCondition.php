<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsCondition extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        TermsCondition::create([
            'content' => $validatedData['content'],
        ]);

        return redirect()->back()->with('success', 'Terms Condition added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        // Create a new PrivacyPolicy instance and store in the database
        $item = TermsCondition::findOrFail($id);
        $item->update([
            'content' => $validatedData['content'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Terms Condition added successfully.');
    }
}
