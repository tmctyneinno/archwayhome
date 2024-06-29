<?php

namespace App\Providers;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\PrivacyPolicy;
use App\Models\Project;
use App\Models\ProjectMenu;
use App\Models\QuickLink;
use App\Models\Slider;
use App\Models\Sociallink;
use App\Models\Team;
use App\Models\TermsConditions;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('contactUs', ContactUs::first());
        View::share('aboutUs', AboutUs::first());
        View::share('whyChooseUs', WhyChooseUs::first());
        View::share('sociallink', Sociallink::first());
        View::share('projects', Project::latest()->get());
        View::share('homeprojects', Project::latest()->take(3)->get());
        View::share('menuItems', MenuItem::with('dropdownItems')->get());
        View::share('sliders', Slider::all());
        View::share('teams', Team::all());
        View::share('policies', PrivacyPolicy::first());
        View::share('termsCondition', TermsConditions::first());
        View::share('posts', Post::all());
        View::share('recentPosts', Post::inRandomOrder()->take(3)->get());
        View::share('projectMenus',ProjectMenu::latest()->get());
        View::share('galleries',Gallery::latest()->get());
        View::share('quicklinks', QuickLink::inRandomOrder()->take(4)->get());
      
    }
}
