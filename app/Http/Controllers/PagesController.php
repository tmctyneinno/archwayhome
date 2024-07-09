<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    public function index($slug)
    {
        $url = "https://api.paystack.co/bank";
        $secret_key = "YOUR_SECRET_KEY"; 
        // Make GET request to Paystack API
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $secret_key,
                'Accept' => 'application/json',
            ]
        ]);

        $response = $client->request('GET', $url);

        
        $pages = [
            'about-us' => 'users.pages.about',
            'projects' => 'users.pages.projects',
            'contact' => 'users.pages.contact',
            'blog' => 'users.pages.post',
            'galleries' => 'users.pages.gallery',
            'consultant-form' => 'users.pages.consultant-form',
            'faqs' => 'users.pages.faqs',
        ];
        $url = "https://api.paystack.co/bank";
        $secret_key = "YOUR_SECRET_KEY"; 
        // Make GET request to Paystack API
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $secret_key,
                'Accept' => 'application/json',
            ]
        ]);

        $response = $client->request('GET', $url);
        if ($response->getStatusCode() == 200) {
            $banks = json_decode($response->getBody())->data;
             // Sort banks alphabetically by name
            usort($banks, function($a, $b) {
                return strcmp($a->name, $b->name);
            });
            // return dd($banks);

            if (array_key_exists($slug, $pages)) {
                return view($pages[$slug], compact('banks'));
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

}
