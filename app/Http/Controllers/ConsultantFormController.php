<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultantFormController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:consultants,email',
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
        ],[
            'con_email.same' => 'The confirm email must match the email.'
        ]);

        // If validation fails, return JSON response with errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'errors' => $validator->errors()->toArray()
            ]);
        }

        // Create new Consultant instance
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

        // Optionally, you can return a response or redirect
        return response()->json(['success' => true, 'message' => 'Consultant form submitted successfully']);
    }
}
