<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Project;
use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\ConsultantFormController; 

class PagesController extends Controller
{
    public function __construct(ConsultantFormController $consultantFormController)
    {
        $this->consultantFormController = $consultantFormController;
    }
    
    public function index($slug)
    {
       
        $pages = [
            'about-us' => 'users.pages.about',
            'projects' => 'users.pages.projects',
            'contact' => 'users.pages.contact',
            'blog' => 'users.pages.post',
            'project-status' => 'users.pages.project-status',
            'consultant-form' => 'users.pages.consultant-form',
            'faqs' => 'users.pages.faqs',
            'events' => 'users.pages.events',
            'terms-conditions'  => 'users.pages.terms-conditions',
            'privacy-policy'  => 'users.pages.privacy-policy',
        ];
       
        if (array_key_exists($slug, $pages)) {
            $banks = $this->fetchBanks(); 
            return view($pages[$slug], compact('banks',));
        }

        // Handle referral links
        if (strpos($slug, 'referral/') == 0) {
            
            $referralCode = explode('/', $slug);
            
            $referralDetails = Consultant::where('referralCode', $referralCode)->first();
           
            if ($referralDetails) {
                $banks = $this->fetchBanks(); 
                return view('users.pages.consultant-form', compact('referralDetails', 'banks'));
            } else {
                // If referral code is not found, return 404
                return view('errors.404');
            }
        }
        
        $specialPages = [
            'currently-selling',
            'closed-sales',
            'sold-out', 
            'upcoming-projects',
        ]; 
       
        if (in_array($slug, $specialPages)) {
            $projectType = ProjectMenu::where('slug', $slug)->first();

            if (!$projectType) {
                return view('errors.404'); 
            }

            $projectList = Project::where('project_menu_id', $projectType->id)->paginate(8);
            $relatedProject = Project::where('project_menu_id', $projectType->id)->inRandomOrder()->get();

            return view('users.pages.project-type', compact('projectList', 'projectType', 'relatedProject'));
        }

        // If slug does not match any defined page, return 404
        return view('errors.404');
    }

    private function generateReferralCode()
    {
        return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
    }

    private function fetchBanks()
    {
        $url = "https://api.paystack.co/bank";
        $secret_key = "YOUR_SECRET_KEY";

        // Make GET request to Paystack API using Guzzle HTTP client
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $secret_key,
                'Accept' => 'application/json',
            ]
        ]);

        try {
            $response = $client->request('GET', $url);

            if ($response->getStatusCode() == 200) {
                $banks = json_decode($response->getBody())->data;

                // Sort banks alphabetically by name
                usort($banks, function ($a, $b) {
                    return strcmp($a->name, $b->name);
                });

                return $banks;
            }
        } catch (\Exception $e) {
            // Log or handle exception
            return [];
        }

        return [];
    }

}
