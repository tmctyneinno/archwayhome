<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Http;
use Twilio\Rest\Client;
use App\Mail\InspectionBooked;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BookInspection extends Controller
{
    public function index(){
        return view('admin.inspection.index');
    }
    
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'project' => 'required|string',
            'inspectionDate' => 'required|date',
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
        // If validation fails, return JSON response with errors
        if ($validator->fails()) {

            return redirect()->back()->with('error', $validator->errors()->toArray());
        }

        $inspection = new Inspection();

        $inspection->full_name = $request->input('fullname');
        $inspection->email = $request->input('email');
        $inspection->phone = $request->input('phone');
        $inspection->project = $request->input('project');
        $inspection->inspection_date = $request->input('inspectionDate');
        $inspection->save();

        // Prepare the inspection details
        $inspectionDetails = [
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'project' => $request->input('project'),
            'inspectionDate' => $request->input('inspectionDate'),
        ];

        // Send email
        Mail::to('eshanokpe@gmail.com')->send(new InspectionBooked($inspectionDetails));

        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $whatsappMessage = "New Inspection Booking:\n" .
                        "Name: {$inspectionDetails['fullname']}\n" .
                        "Email: {$inspectionDetails['email']}\n" .
                        "Phone: {$inspectionDetails['phone']}\n" .
                        "Project: {$inspectionDetails['project']}\n" .
                        "Date: {$inspectionDetails['inspectionDate']}";

        $twilio->messages->create(
            'whatsapp:+2348139267960' , // WhatsApp recipient
            [
                'from' => env('TWILIO_WHATSAPP_FROM'),
                'body' => $whatsappMessage
            ]
        );

        return redirect()->back()->with('success', 'Book Inspection Form Submitted successfully.');

    }

    public function show($id){
        $inspection = Inspection::findOrFail(decrypt($id));
        return view('admin.inspection.show', compact('inspection'));
    }

    public function destroy($id)
    {
        $inspection = Inspection::find(decrypt($id));

        if (!$inspection) {
            return redirect()->back()->with('error', 'Book Inspection data not found.');
        }

        $inspection->delete();

        return redirect()->back()->with('success', 'Book Inspection data deleted successfully.');
    }
}
