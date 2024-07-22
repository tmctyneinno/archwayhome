<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMenu;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('admin.projects.index');
    }

    public function create(){ 
        $projectMenus = ProjectMenu::all();
        return view('admin.projects.create', $projectMenus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'project_menu_id' => 'required|exists:project_menus,id',
            'content' => 'required|string',
            'brochure' => 'required|mimes:pdf|max:20240',
            'land_payment_plan' => 'required|mimes:jpeg,png,jpg,gif|max:20240',
            'subscription_form' => 'required|mimes:pdf|max:20240',
            'video_link' => 'required|string', 
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:20240', 
        ]);

       
        $brochurePath = $request->file('brochure')->getClientOriginalName();
        $request->file('brochure')->move(public_path('projectDocument/brochures'), $brochurePath);

        $landPaymentPlanPath = $request->file('land_payment_plan')->getClientOriginalName();
        $request->file('land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $landPaymentPlanPath);

        $subscriptionFormPath = $request->file('subscription_form')->getClientOriginalName();
        $request->file('subscription_form')->move(public_path('projectDocument/subscriptionForms'), $subscriptionFormPath);

        $imagePath = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('projectDocument/projectsImages'), $imagePath);

        Project::create([
            'title' => $request->title,
            'sub_title' => $request->title,
            'location' => $request->location,
            'land_size' =>  $request->land_size,
            'project_menu_id' =>  $request->project_menu_id,
            'content' => $request->content,
            'brochure' => 'projectDocument/brochures/' . $brochurePath,
            'land_payment_plan' => 'projectDocument/landPaymentPlans/' . $landPaymentPlanPath,
            'subscription_form' => 'projectDocument/subscriptionForms/' . $subscriptionFormPath,
            'video_link' => $request->video_link,
            'image' => 'projectDocument/projectsImages/' . $imagePath,
        ]);

        return redirect()->route('admin.project.create')->with('success', 'Project created successfully.');
    }

    public function edit($id){
        $project = Project::findOrFail( decrypt($id));
        $projectMenus = ProjectMenu::all(); 
        return view('admin.projects.edit', compact('project','projectMenus'));
    }

    public function update(Request $request,  $id)
    {
        // dd($request->file('subscription_forms'));

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'project_menu_id' => 'required|exists:project_menus,id',
            'content' => 'required|string',
            'brochure' => 'nullable|mimes:pdf|max:20240',
            'landPaymentPlan' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240',
            'subscription_forms' => 'nullable|mimes:pdf|max:20240', 
            'video_link' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240', 
        ]);
        $project = Project::findOrFail($id);
        $data = $request->only(['title', 'sub_title', 'location', 'content', 'brochure', 'video_link', 'land_size', 'project_menu_id', 'subscription_form']);

        if ($request->hasFile('brochure')) {
          
            if ($project->brochure) {
                $oldBrochurePath = public_path($project->brochure);
                if (file_exists($oldBrochurePath)) {
                    unlink($oldBrochurePath);
                }
            }

            $brochurePath = $request->file('brochure')->getClientOriginalName();
            $request->file('brochure')->move(public_path('projectDocument/brochures'), $brochurePath);
            $data['brochure'] = 'projectDocument/brochures/' . $brochurePath;
        }

       
        if ($request->hasFile('landPaymentPlan')) {
          
            if ($project->land_payment_plan) {
                $oldLandPaymentPlanPath = public_path($project->land_payment_plan);
                if (file_exists($oldLandPaymentPlanPath)) {
                    unlink($oldLandPaymentPlanPath);
                }
            }

            $imagePath = $request->file('landPaymentPlan')->getClientOriginalName();
            $request->file('landPaymentPlan')->move(public_path('projectDocument/landPaymentPlans'), $imagePath);
            $data['land_payment_plan'] = 'projectDocument/landPaymentPlans/' . $imagePath;
        }

        if ($request->hasFile('subscription_forms')) {
            $subscriptionFormPath = $request->file('subscription_forms')->getClientOriginalName();
            $request->file('subscription_forms')->move(public_path('projectDocument/subscriptionForms'), $subscriptionFormPath);
            $data['subscription_form'] = 'projectDocument/subscriptionForms/' . $subscriptionFormPath;

            // Remove old file if exists
            if ($project->subscription_form) {
                $oldSubscriptionFormPath = public_path($project->subscription_form);
                if (file_exists($oldSubscriptionFormPath)) {
                    unlink($oldSubscriptionFormPath);
                }
            }
        }

        if ($request->hasFile('image')) {
          
            if ($project->image) {
                $oldImagePath = public_path($project->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imagePath = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('projectDocument/projectsImages'), $imagePath);
            $data['image'] = 'projectDocument/projectsImages/' . $imagePath;
        }

        $project->update($data);

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function projects(){
        return view('home.projects');
    }

    public function projectsType($slug)
    {
        $projectType = ProjectMenu::where('slug', $slug)->first();

        if (!$projectType) {
            return view('errors.404');
        }

        $projectList = Project::where('project_menu_id', $projectType->id)->paginate(8);
        $relatedProject = Project::where('project_menu_id', $projectType->id)->inRandomOrder()->get();
      
      
        return view('users.pages.project-type', compact('projectList','projectType','relatedProject'));
    }

}
