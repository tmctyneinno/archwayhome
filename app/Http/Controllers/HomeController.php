<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Slider;
use Alert;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

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
    

    public function detailsPost($id){
        $decryptedId = decrypt($id);
        $postDetails = Post::with(['comments' => function($query) {
            $query->whereNull('parent_id')->with('replies');
        }])->findOrFail($decryptedId);

        return view('users.posts.post-details', compact('postDetails'));
    }
    public function detailsProject($id) {
        $decryptedId = decrypt($id);
        $projectDetails = Project::findOrFail($decryptedId);
        $id = $projectDetails->project_menu_id;
        $relatedProject = Project::where('project_menu_id', $id)->get();
       
        if (!$projectDetails) {
            return view('errors.404');
        }
  
        return view('users.pages.project-details', compact('projectDetails','relatedProject')); 
    }

    public function storeComment(Request $request){
        // Validate incoming request
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id'
        ]);
    
        Comment::create($request->all());
        
        return response()->json(['message' => 'Comment submitted successfully']);
    }

    public function blog(){
        $posts = Post::latest()->get();
        return view('home.post', compact('posts'));
    }

    public function detailsService($id){
        $decryptedId = decrypt($id);
        $service = Service::findOrFail($decryptedId);

        $relatedServices = Service::where('id', '!=', $decryptedId)
                                  ->latest()
                                  ->paginate(2); 
    
        return view('users.pages.service-details', compact('service','relatedServices'));
    }
    
    
   
}