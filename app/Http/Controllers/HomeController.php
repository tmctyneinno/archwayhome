<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }

     public function indexx()
    {
        return view('home');
    }

    public function properties(){
        return view('home.properties');
    }

   

    public function propertyalert(){
        return view('home.property-alert');
    }

    public function listyourproperty(){
        return view('home.list-your-property');
    }

    public function login(){
        return view('home.login');
    }

    public function registration(){
        return view('home.registration');
    }
    public function checkout(){
        return view('home.checkout');
    }

    public function contactus(){
        return view('home.contactus');
    }
    public function about(){
        return view('home.about');
    }
    public function privacypolicy(){
        return view('home.privacypolicy');
    }

    public function detailsProject($id){
        $project = Project::findOrFail( decrypt($id));
        return view('home.property-details', compact('project'));
    }
    
   
}