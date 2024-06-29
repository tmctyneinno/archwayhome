<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($slug){
        // dd($slug);
        switch ($slug) {
            case "about-us":
                // Assuming 'HomeController' is your actual controller class name and 'index' is the method name
                return view('users.pages.about');
                break;
            case "projects":
                    // Assuming 'HomeController' is your actual controller class name and 'index' is the method name
                    return view('users.pages.projects');
                    break;
            default:
                return view('errors.404');
                break;
        }
    
            
    }
}
