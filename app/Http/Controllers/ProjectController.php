<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use Exception;

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
            'land_price' => 'required|string|max:255',
            'second_land_size' => 'nullable|string|max:255',
            'second_land_price' => 'nullable|string|max:255',
            'project_menu_id' => 'required|exists:project_menus,id',
            'content' => 'required|string',
            'amenities_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240', 
            'brochure' => 'nullable|mimes:pdf|max:90240',
            'land_payment_plan' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240',
            'second_payment_plan' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240',
            'subscription_forms' => 'nullable|mimes:pdf|max:20240', 
            'video_link' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240', 
            'image_banner' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240', 
        ]);
    
        try {
            // Initialize paths
            $brochurePath = null;
            $landPaymentPlanPath = null;
            $subscriptionFormPath = null;
            $imagePath = null;
            $amenitiesPath = null;

            // Check if files are uploaded and process them
            if ($request->hasFile('amenities_image')) {
                $amenitiesPath = $request->file('amenities_image')->getClientOriginalName();
                $request->file('amenities_image')->move(public_path('projectDocument/amenitiesImages'), $amenitiesPath);
            }
            if ($request->hasFile('brochure')) {
                $brochurePath = $request->file('brochure')->getClientOriginalName();
                $request->file('brochure')->move(public_path('projectDocument/brochures'), $brochurePath);
            }
    
            if ($request->hasFile('land_payment_plan')) {
                $landPaymentPlanPath = $request->file('land_payment_plan')->getClientOriginalName();
                $request->file('land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $landPaymentPlanPath);
            }

            if ($request->hasFile('second_land_payment_plan')) {
                $secondlandPaymentPlanPath = $request->file('second_land_payment_plan')->getClientOriginalName();
                $request->file('second_land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $landPaymentPlanPath);
            }
    
            if ($request->hasFile('subscription_form')) {
                $subscriptionFormPath = $request->file('subscription_form')->getClientOriginalName();
                $request->file('subscription_form')->move(public_path('projectDocument/subscriptionForms'), $subscriptionFormPath);
            }
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('projectDocument/projectsImages'), $imagePath);
            }

            if ($request->hasFile('image_banner')) {
                $imageBannerPath = $request->file('image_banner')->getClientOriginalName();
                $request->file('image_banner')->move(public_path('projectDocument/projectsImages'), $imageBannerPath);
            }
    
            // Create the project
            Project::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'location' => $request->location,
                'land_size' => $request->land_size,
                'land_price' => $request->land_price,
                'second_land_size' => $request->second_land_size,
                'second_land_price' => $request->second_land_price,
                'project_menu_id' => $request->project_menu_id,
                'content' => $request->content,
                'amenities_images' => $amenitiesPath ? 'projectDocument/amenitiesImages/' . $amenitiesPath : null,
                'brochure' => $brochurePath ? 'projectDocument/brochures/' . $brochurePath : null,
                'land_payment_plan' => $landPaymentPlanPath ? 'projectDocument/landPaymentPlans/' . $landPaymentPlanPath : null,
                'second_land_payment_plan' => $landPaymentPlanPath ? 'projectDocument/landPaymentPlans/' . $secondlandPaymentPlanPath : null,
                'subscription_form' => $subscriptionFormPath ? 'projectDocument/subscriptionForms/' . $subscriptionFormPath : null,
                'video_link' => $request->video_link,
                'image' => $imagePath ? 'projectDocument/projectsImages/' . $imagePath : null,
                'image_banner' => $imageBannerPath ? 'projectDocument/projectsImages/' . $imageBannerPath : null,
            ]);
    
            return redirect()->route('admin.project.create')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error creating the project.');
        }
    }
    

    public function edit($id){
        $project = Project::findOrFail( decrypt($id));
        $projectMenus = ProjectMenu::all(); 
        return view('admin.projects.edit', compact('project','projectMenus'));
    }

    public function update(Request $request,  $id)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255', 
            'location' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'land_price' => 'required|string|max:255',
            'second_land_size' => 'nullable|string|max:255',
            'second_land_price' => 'nullable|string|max:255',
            'project_menu_id' => 'required|exists:project_menus,id',
            'content' => 'required|string',
            'amenities_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240', 
            'brochure' => 'nullable|mimes:pdf|max:90240',
            'land_payment_plan' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240',
            'second_land_payment_plan' => 'nullable|mimes:jpeg,png,jpg,gif|max:90240',
            'subscription_form' => 'nullable|mimes:pdf|max:20240', 
            'video_link' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240', 
            'image_banner' => 'nullable|mimes:jpeg,png,jpg,gif|max:20240', 
        ]);
        $project = Project::findOrFail($id);
        $data = $request->only([
            'title', 'sub_title', 'location', 
            'content', 'brochure', 'video_link', 
            'land_size', 'land_price', 'second_land_size', 
            'second_land_price', 'project_menu_id', 'subscription_form'
        ]);

        if ($request->hasFile('amenities_image')) {
            if ($project->amenities_image) {
                $oldAmenitiesPath = public_path($project->amenities_image);
                if (file_exists($oldAmenitiesPath)) {
                    unlink($oldAmenitiesPath);
                }
            }

            $amenitiesPath = $request->file('amenities_image')->getClientOriginalName();
            $request->file('amenities_image')->move(public_path('projectDocument/amenitiesImages'), $amenitiesPath);
            $data['amenities_image'] = 'projectDocument/amenitiesImages/' . $amenitiesPath;
        }

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

       
        if ($request->hasFile('land_payment_plan')) {
            if ($project->land_payment_plan) {
                $oldLandPaymentPlanPath = public_path($project->land_payment_plan);
                if (file_exists($oldLandPaymentPlanPath)) {
                    unlink($oldLandPaymentPlanPath);
                }
            }

            $imagePath = $request->file('land_payment_plan')->getClientOriginalName();
            $request->file('land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $imagePath);
            $data['land_payment_plan'] = 'projectDocument/landPaymentPlans/' . $imagePath;
        }

        if ($request->hasFile('second_land_payment_plan')) {
          
            if ($project->second_land_payment_plan) {
                $oldSecondLandPaymentPlanPath = public_path($project->second_land_payment_plan);
                if (file_exists($oldSecondLandPaymentPlanPath)) {
                    unlink($oldSecondLandPaymentPlanPath);
                }
            }

            $imageSecondPath = $request->file('second_land_payment_plan')->getClientOriginalName();
            $request->file('second_land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $imageSecondPath);
            $data['second_land_payment_plan'] = 'projectDocument/landPaymentPlans/' . $imageSecondPath;
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

        if ($request->hasFile('image_banner')) {
          
            if ($project->image_banner) {
                $oldImagePath = public_path($project->image_banner);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageBannerPath = $request->file('image_banner')->getClientOriginalName();
            $request->file('image_banner')->move(public_path('projectDocument/projectsImages'), $imageBannerPath);
            $data['image_banner'] = 'projectDocument/projectsImages/' . $imageBannerPath;
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
    public function destroy($id)
    {
        $service= Project::findOrFail(decrypt($id));
        $service->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project deleted successfully.');
    }
}
