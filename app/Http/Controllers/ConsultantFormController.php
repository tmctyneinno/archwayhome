<?php

namespace App\Http\Controllers;

use App\Mail\NoReferralEmail;
use App\Models\Consultant;
use App\Models\ReferralLog;
use App\Rules\Recaptcha;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Http; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferralEmail;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Log;


class ConsultantFormController extends Controller
{
    
    public function index(){
        return view('admin.consultant.index');
    }
 
    public function store(Request $request)
    { 
        try{
   
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
                'g-recaptcha-response' => 'required',
                'referral_code' => 'nullable|string',
            ],[
                'con_email.same' => 'The confirm email must match the email.',
                'g-recaptcha-response.required' => 'Please select the reCAPTCHA checkbox.',
                'g-recaptcha-response' => 'The reCAPTCHA validation failed.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }   

            $recaptcha = $request->input('g-recaptcha-response');
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secretKey'),
                'response' => $recaptcha,
                'remoteip' => $request->ip(), 
            ]);
        
            $recaptchaData = $response->json(); 
            $recaptcha_success = $recaptchaData['success'] ?? false; 
        
            // If reCAPTCHA validation fails
            if (!$recaptcha_success) {
                return redirect()->back()->withInput()->withErrors(['recaptcha' => 'Please verify that you are not a robot.']);
            }
        
            $userId = substr(strtoupper($request->fullname), 0, 3) . '-' . mt_rand(1000, 9999);
            $password = Str::random(10);
            $referralCode = $this->generateReferralCode();

            $consultant = new Consultant();
            $consultant->user_id = $userId;
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
            $consultant->referralCode = $referralCode;
            $consultant->password = bcrypt($password);
            $consultant->save();

            $referralDetails = Consultant::where('referralCode', $referralCode)->first();
            $referralLink = "https://archwayhome.com/consultant-form/referral/{$referralCode}";

            if($request->has('referral_code') && $request->referral_code){
                $this->sendReferralEmail($referralCode, $referralDetails, $referralLink,  $userId, $password);
                $referrer = Consultant::where('referralCode', $request->referral_code)->first();
                if ($referrer) {
                    ReferralLog::create([
                        'consultant_id' => $consultant->id,
                        'referrer_id' => $referrer->id,
                    ]);
                }
            }else{
                $this->sendNoReferralEmail($referralDetails, $referralLink,  $userId, $password);
            }

            return redirect()->back()->with('success', 'Consultant form sent successfully!');
            
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    private function sendNoReferralEmail($referralDetails,$referralLink, $userId, $password)
    {
        $companyName = 'Archway Homes and Investment Limited'; 
        Mail::to($referralDetails->email)->send(new NoReferralEmail($companyName, $referralDetails, $referralLink, $userId, $password));
    }
 
    private function generateReferralCode()
    {
        return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
    }

    private function sendReferralEmail($referral_code, $referralDetails, $referralLink, $userId, $password)
    {
        
        $companyName = $referralDetails->fullname;

        Mail::to($referralDetails->email)->send(new ReferralEmail($companyName, $referralDetails, $referralLink, $userId, $password));
    }

    

    public function show($id)
    {
        $consultant = Consultant::findOrFail(decrypt($id));
        // Get all referrals received and their referrer details
        $referralsReceived = $consultant->referralsReceived;
        $referrerDetails = $referralsReceived->map(function ($referralLog) {
            return $referralLog->referrer; // Collect referrer details
        });

        return view('admin.consultant.show', compact('consultant', 'referrerDetails'));
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
