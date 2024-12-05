<?php

namespace App\Providers;
use App\Models\Consultant;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\Event;
use App\Models\CoreValue;
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
use Illuminate\Support\Facades\Auth;

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
        $projects = Project::latest()->paginate(20);
        View::share('projects', $projects); 
        $totalProjects = $projects->count();
        View::share('totalProjects', $totalProjects);
        $consultant = Consultant::latest()->get();
        $consultants = Consultant::select('*')
            ->withCount(['referralsMade as total_referrals_made', 'referralsReceived as total_referrals_received'])
            ->latest()->paginate(20); 
            
        $totalConsultant = $consultant->count();
        View::share('totalConsultant', $totalConsultant);
        $inspection = Inspection::latest()->paginate(20);
        $totalInspection = $inspection->count();
        View::share('totalInspection', $totalInspection);
        $contact = Contact::latest()->paginate(20);
        $totalContact = $contact->count();
        View::share('totalContacts', $totalContact);
        View::share('contacts', $contact);
        $posts = Post::latest()->paginate(20);
        $totalPost = $posts->count();
        View::share('totalPost', $totalPost);
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(20);
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

        // $events = Event::latest()->get();
        $events = Event::orderBy('created_at', 'desc')->paginate(20);
        $totalEvent = $events->count();
        View::share('events', $events);
        View::share('totalEvent', $totalEvent);

        View::share('consultant', $consultant);
        // View::share('consultants', $consultants);
        View::share('inspections', $inspection);
        View::share('contactUs', ContactUs::first());
        View::share('aboutUs', AboutUs::first());
        View::share('coreValue', CoreValue::first()); 
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
        View::share('projectMenus',ProjectMenu::get());
        View::share('quicklinks', QuickLink::inRandomOrder()->take(4)->get());
        View::share('services', Service::latest()->get());
        $admin = Auth::guard('admin')->user();
        View::share('admin', Auth::guard('admin')->user());
         
      
    }
}
