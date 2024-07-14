<?php

namespace App\Providers;
use App\Models\Consultant;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\ExecutiveSummary;
use App\Models\Faqs;
use App\Models\FaqsSubmitForm;
use App\Models\Gallery;
use App\Models\Inspection;
use App\Models\MenuItem;
use App\Models\OfficeHours;
use App\Models\Post;
use App\Models\PrivacyPolicy;
use App\Models\Project;
use App\Models\ProjectMenu;
use App\Models\QuickLink;
use App\Models\Service;
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
        $projects = Project::latest()->get();
        View::share('projects', $projects);
        $totalProjects = $projects->count();
        View::share('totalProjects', $totalProjects);
        $consultant = Consultant::latest()->get();
        $totalConsultant = $consultant->count();
        View::share('totalConsultant', $totalConsultant);
        $inspection = Inspection::latest()->get();
        $totalInspection = $inspection->count();
        View::share('totalInspection', $totalInspection);
        $contact = Contact::latest()->get();
        $totalContact = $contact->count();
        View::share('totalContacts', $totalContact);
        View::share('contacts', $contact);
        $posts = Post::latest()->get();
        $totalPost = $posts->count();
        View::share('totalPost', $totalPost);
        $galleries = Gallery::latest()->get();
        $totalGallery = $galleries->count();
        View::share('galleries', $galleries);
        View::share('totalGallery', $totalGallery);
        $faqs = Faqs::latest()->get();
        $totalFaqs = $faqs->count();
        View::share('totalFaqs', $totalFaqs);
        View::share('faqs', $faqs);
        $faqsSubmitForm = FaqsSubmitForm::latest()->get();
        $totalSubmitForm = $faqsSubmitForm->count();
        View::share('totalFaqSubmitForm', $totalSubmitForm);

       
        View::share('consultants', $consultant);
        View::share('inspections', $inspection);
        View::share('contactUs', ContactUs::first());
        View::share('aboutUs', AboutUs::first());
        View::share('executiveSummary', ExecutiveSummary::first());
        View::share('officeHour', OfficeHours::first());
        View::share('whyChooseUs', WhyChooseUs::first());
        View::share('sociallink', Sociallink::first());
        View::share('homeprojects', Project::latest()->take(3)->get());
        View::share('menuItems', MenuItem::with('dropdownItems')->get());
        View::share('sliders', Slider::all());
        View::share('teams', Team::all());
        View::share('policies', PrivacyPolicy::first());
        View::share('termsCondition', TermsConditions::first());
        View::share('posts', Post::paginate(8));
        View::share('recentPosts', Post::inRandomOrder()->take(3)->get());
        View::share('projectMenus',ProjectMenu::latest()->get());
        View::share('quicklinks', QuickLink::inRandomOrder()->take(4)->get());
        View::share('services', Service::latest()->get());
      
    }
}
