<?php

namespace App\Http\Controllers;

use App\Services\SystemeService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    protected $systemeService;

    public function __construct(SystemeService $systemeService)
    {
        $this->systemeService = $systemeService;
    }

    public function index(){
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
            ]);

            $response = $this->systemeService->addSubscriber(
                $request->email,
                'Test', // Replace with your actual Systeme.io list/tag ID 
                $request->first_name,
                $request->last_name
            );
            dd($response);
            if (isset($response['error'])) {
                return back()->with('error', ' Failed to subscribe. Please try again.');
            }

            return back()->with('success', 'You have been subscribed successfully!');
        }catch(Exception $e){
            return back()->with('error', 'Failed to subscribe. Please try again.'.$e->getMessage());
        }
    }

    public function showContacts()
    {
        $contacts = $this->systemeService->getContacts();
        
        return response()->json($contacts); // Return contacts data as JSON response
    }
}
