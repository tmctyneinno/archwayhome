<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMenu;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($slug)
    {
        $pages = [
            'about-us' => 'users.pages.about',
            'projects' => 'users.pages.projects',
            'contact' => 'users.pages.contact',
            'blog' => 'users.pages.post',
            'galleries' => 'users.pages.gallery',
            'consultant-form' => 'users.pages.consultant-form',
            'faqs' => 'users.pages.faqs',
        ];

        if (array_key_exists($slug, $pages)) {
            return view($pages[$slug]);
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
