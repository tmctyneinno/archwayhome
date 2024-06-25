<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('admin.projects.index');
    }

    public function create(){
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'content' => 'required|string',
            'brochure' => 'required|mimes:pdf|max:5048',
            'land_payment_plan' => 'required|mimes:jpeg,png,jpg,gif|max:5048',
            'subscription_form' => 'required|mimes:pdf|max:5048',
            'video_link' => 'required|string', 
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048', 
        ]);

       
        $brochurePath = $request->file('brochure')->getClientOriginalName();
        $request->file('brochure')->move(public_path('projectDocument/brochures'), $brochurePath);

        $landPaymentPlanPath = $request->file('landPaymentPlan')->getClientOriginalName();
        $request->file('land_payment_plan')->move(public_path('projectDocument/landPaymentPlans'), $landPaymentPlanPath);

        $subscriptionFormPath = $request->file('subscription_form')->getClientOriginalName();
        $request->file('subscription_form')->move(public_path('projectDocument/subscriptionForms'), $subscriptionFormPath);

        $imagePath = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('projectDocument/projectsImages'), $imagePath);

        Project::create([
            'title' => $request->title,
            'location' => $request->location,
            'land_size' =>  $request->land_size,
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
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'content' => 'required|string',
            'brochure' => 'mimes:pdf|max:5048',
            'landPaymentPlan' => 'mimes:jpeg,png,jpg,gif|max:5048',
            'subscription_form' => 'mimes:pdf|max:5048',
            'video_link' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $project = Project::findOrFail($id);
        $data = $request->only(['title', 'location', 'content','video_link','land_size']);

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

            $landPaymentPlanPath = $request->file('landPaymentPlan')->getClientOriginalName();
            $request->file('landPaymentPlan')->move(public_path('projectDocument/landPaymentPlans'), $landPaymentPlanPath);
            $data['land_payment_plan'] = 'projectDocument/landPaymentPlans/' . $landPaymentPlanPath;
        }

        if ($request->hasFile('subscription_form')) {
          
            if ($project->subscription_form) {
                $oldSubscriptionFormPath = public_path($project->subscription_form);
                if (file_exists($oldSubscriptionFormPath)) {
                    unlink($oldSubscriptionFormPath);
                }
            }

            $subscriptionFormPath = $request->file('subscription_form')->getClientOriginalName();
            $request->file('subscription_form')->move(public_path('projectDocument/subscriptionForms'), $subscriptionFormPath);
            $data['subscription_form'] = 'projectDocument/subscriptionForms/' . $subscriptionFormPath;
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

        return redirect()->route('admin.project.index')->with('success', 'Project updated successfully.');
    }
}
