<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Http;

class ConsultantFormController extends Controller
{
    public function index(){
        return view('admin.consultant.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            // 'email' => 'required|email|unique:consultants,email',
            'email' => 'required|email',
            'con_email' => 'required|email|same:email',
            'dateofbirth' => 'required|date',
            'gender' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'g-recaptcha-response' => 'required',
        ],[
            'con_email.same' => 'The confirm email must match the email.'
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
       

        $consultant = new Consultant();
        $consultant->fullname = $request->fullname;
        $consultant->phone = $request->phone;
        $consultant->email = $request->email;
        $consultant->date_of_birth = $request->dateofbirth;
        $consultant->gender = $request->gender;
        $consultant->city = $request->city;
        $consultant->country = $request->country;
        $consultant->state = $request->state;
        $consultant->address = $request->address;
        $consultant->account_name = $request->account_name;
        $consultant->account_number = $request->account_number;
        $consultant->bank = $request->bank;
        $consultant->save();

        return redirect()->back()->with('success', 'Consultant form sent successfully!');
    }

    public function show($id){
        $consultant = Consultant::findOrFail(decrypt($id));
        return view('admin.consultant.show', compact('consultant'));
    }

    public function destroy($id)
    {
        $consultant = Consultant::findOrFail(decrypt($id));
        // dd($consultant);
        if (!$consultant) {
            return redirect()->back()->with('error', 'Consultant data not found.');
        }

        $consultant->delete();

        return redirect()->back()->with('success', 'Consultant data deleted successfully.');
    }
}
