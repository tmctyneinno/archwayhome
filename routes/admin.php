<?php

use App\Http\Controllers\BookInspection;
use App\Http\Controllers\ConsultantFormController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\QuicklinkController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Models\PrivacyPolicy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\GalleryContoller;



Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/manage/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/manage/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth.admin')->group(function () {
        Route::post('/settings/update-password', [AdminLoginController::class, 'updatePassword'])->name('admin.password.update');
        Route::get('/settings/show-password', [AdminLoginController::class, 'showChangePasswordForm'])->name('admin.show.password');
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        // Menu
        Route::get('/manage/project/index', [MenuController::class, 'projectMenu'])->name('admin.project.projectMenu');
        Route::post('/project/menu/store', [MenuController::class, 'storeProjectMenu'])->name('admin.projectMenu.store');
        Route::get('/project/menu/store/{id}', [MenuController::class, 'editProjectMenu'])->name('admin.projectMenu.edit');
        Route::put('/project-menu/update/{id}', [MenuController::class, 'updateProjectMenu'])->name('admin.projectMenu.update');
        Route::get('/project-menu/destroy/{id}', [MenuController::class, 'destroyProjectMenu'])->name('admin.projectMenu.destroy');

        Route::get('/menu/create', [MenuController::class, 'creatMenu'])->name('admin.menu.create');
        Route::get('/manage/menu/index', [MenuController::class, 'indexMenu'])->name('admin.menu.index');
        Route::post('/menu', [MenuController::class, 'storeMenu'])->name('admin.menu.store');
        Route::get('/menu/{id}/edit', [MenuController::class, 'editMenu'])->name('admin.menu.edit');
        Route::put('/menu/{id}', [MenuController::class, 'updateMenu'])->name('admin.menu.update');
        Route::get('/menu/{id}', [MenuController::class, 'destroyMenu'])->name('admin.menu.destroy');
        //Slider 
        Route::get('/manage/sliderIndex', [SliderController::class, 'indexSlider'])->name('admin.slider.index');
        Route::get('/manage/sliderCreate', [SliderController::class, 'createSlider'])->name('admin.slider.create');
        Route::post('/slider', [SliderController::class, 'storeSlider'])->name('slider.store');
        Route::get('/slider/{id}/edit', [SliderController::class, 'editSlider'])->name('admin.slider.edit');
        Route::put('/slider/{id}', [SliderController::class, 'updateSlider'])->name('admin.slider.update');
        Route::get('/slider/{id}', [SliderController::class, 'destroySlider'])->name('admin.slider.destroy');
        //Why choose us
        Route::get('/settings/content', [SettingsController::class, 'WhyChooseUs'])->name('admin.settings.content');
        Route::post('/settings/store/why-choose-us', [SettingsController::class, 'storeWhyChooseUs'])->name('admin.settings.store_why_choose_us');
        Route::put('/settings/update/why-choose-us/{id}', [SettingsController::class, 'updateWhyChooseUs'])->name('admin.settings.update_why_choose_us');
        //About us
        Route::post('/settings/store/about-us', [SettingsController::class, 'storeAboutUs'])->name('admin.settings.storeAboutus');
        Route::put('/settings/update/about-us/{id}', [SettingsController::class, 'updateAboutUs'])->name('admin.settings.updateAboutus');
        //Executive Summary
        Route::post('/settings/store/executive-summary', [SettingsController::class, 'storeExecutiveSummary'])->name('admin.settings.storeExecutiveSummary');
        Route::put('/settings/update/executive-summary/{id}', [SettingsController::class, 'updateExecutiveSummary'])->name('admin.settings.updateExecutiveSummary');
        //Office Hours
        Route::post('/settings/store/office-hours', [SettingsController::class, 'storeOfficeHours'])->name('admin.office-hours.store');
        Route::put('/settings/update/office-hours/{id}', [SettingsController::class, 'updatestoreOfficeHours'])->name('admin.office-hours.update');
         
        //Contact Us 
        Route::post('/settings/store/contact-us', [SettingsController::class, 'storeContactUs'])->name('admin.settings.storeContactUs');
        Route::put('/settings/update/contact-us/{id}', [SettingsController::class, 'updateContactUs'])->name('admin.settings.updateContactUs');
        //Social Links 
        Route::post('/settings/store/social-links', [SettingsController::class, 'storeSocialLinks'])->name('admin.settings.storeSocialLinks');
        Route::put('/settings/update/social-links/{id}', [SettingsController::class, 'updateSocialLinks'])->name('admin.settings.updateSocialLinks');
       
        //Project
        Route::get('/project/index', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('project/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('project/{id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('/project/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::get('project/{id}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');

        //Blog
        Route::get('post/index', [BlogController::class, 'index'])->name('admin.post.index');
        Route::get('post/create/', [BlogController::class, 'createPost'])->name('admin.post.create');
        Route::post('post/store', [BlogController::class, 'storePost'])->name('admin.post.store');
        Route::get('post/{id}/edit', [BlogController::class, 'editPost'])->name('admin.post.edit');
        Route::put('/post/{id}', [BlogController::class, 'updatePost'])->name('admin.post.update');
        Route::get('post/{id}', [BlogController::class, 'destroyPost'])->name('admin.post.destroy');
        //Teams
        Route::get('/team/create', [TeamController::class, 'create'])->name('admin.team.create');
        Route::post('/team/store', [TeamController::class, 'store'])->name('admin.team.store');
        Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('admin.team.edit');
        Route::put('/team/{id}', [TeamController::class, 'update'])->name('admin.team.update');
        Route::get('/team/{id}', [TeamController::class, 'destroy'])->name('admin.team.destroy');
       
         //Privacy
         Route::post('/store/privacypolicy', [PrivacyController::class, 'store'])->name('admin.privacy.store');
         Route::put('/update/privacypolicy/{id}', [PrivacyController::class, 'update'])->name('admin.privacy.update');
        
        //Terms Conditions
        Route::post('/terms/conditions/store/', [TermsConditionController::class, 'store'])->name('admin.termsCondition.store');
        Route::put('/terms/conditions/update/{id}', [TermsConditionController::class, 'update'])->name('admin.termsCondition.update');
         
        //Events
        Route::get('events/index', [EventController::class, 'index'])->name('admin.events.index');
        Route::get('events/create', [EventController::class, 'create'])->name('admin.events.create');
        Route::post('events/store', [EventController::class, 'store'])->name('admin.events.store');
        Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
        Route::put('/events/{id}', [EventController::class, 'update'])->name('admin.events.update');
        Route::get('/events/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy');

        //Galleries
        Route::get('projects/status/index', [GalleryContoller::class, 'index'])->name('admin.projects.status.index');
        Route::get('projects/status/create', [GalleryContoller::class, 'create'])->name('admin.projects.status.create');
        Route::post('projects/status/store', [GalleryContoller::class, 'store'])->name('admin.projects.status.store');
        Route::get('/projects/status/{id}/edit', [GalleryContoller::class, 'edit'])->name('admin.projects.status.edit');
        Route::put('/projects/status/{id}', [GalleryContoller::class, 'update'])->name('admin.gallery.update');
        Route::get('/gaprojects/statusllery/{id}', [GalleryContoller::class, 'destroy'])->name('admin.projects.status.destroy');
        
        //QuickLink
        Route::get('/quicklink/create', [QuicklinkController::class, 'create'])->name('admin.quicklink.create');
        Route::post('/quicklink/store', [QuicklinkController::class, 'store'])->name('admin.quicklink.store');
        Route::get('quicklink/{id}/edit', [QuicklinkController::class, 'edit'])->name('admin.quicklink.edit');
        Route::put('quicklink/{id}', [QuicklinkController::class, 'update'])->name('admin.quicklink.update');
        Route::get('quicklink/{id}', [QuicklinkController::class, 'destroy'])->name('admin.quicklink.destroy');

        //Services
        Route::get('service/index', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('service/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('post/service', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::put('service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::get('service/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
        //Faqs
        Route::get('faq/index', [FAQController::class, 'index'])->name('admin.faq.index');
        Route::get('faq/create', [FAQController::class, 'create'])->name('admin.faq.create');
        Route::post('post/faq', [FAQController::class, 'store'])->name('admin.faq.store');
        Route::get('faq/{id}/edit', [FAQController::class, 'edit'])->name('admin.faq.edit');
        Route::put('faq/{id}', [FAQController::class, 'update'])->name('admin.faq.update');
        Route::get('faq/{id}', [FAQController::class, 'destroy'])->name('admin.faq.destroy');
        Route::get('faq/submt/form', [FAQController::class, 'submtFormView'])->name('admin.faq.submtForm');
        Route::get('/faq/form/view/{id}', [FAQController::class, 'submitFormShow'])->name('admin.faq.submitForm.show');
        Route::get('/faq/form/destroy/{id}', [FAQController::class, 'submitFormDestroy'])->name('admin.faq.submitForm.destroy');

        //Consultant
        Route::get('/consultant/index', [ConsultantFormController::class, 'index'])->name('admin.consultant.index');
        Route::get('/consultant/show/{id}', [ConsultantFormController::class, 'show'])->name('admin.consultant.show');
        Route::get('/consultant/destroy/{id}', [ConsultantFormController::class, 'destroy'])->name('admin.consultant.destroy');
        //Book Inspection
        Route::get('/inspection/index', [BookInspection::class, 'index'])->name('admin.inspection.index');
        Route::get('/inspection/show/{id}', [BookInspection::class, 'show'])->name('admin.inspection.show');
        Route::get('/inspection/destroy/{id}', [BookInspection::class, 'destroy'])->name('admin.inspection.destroy');
        //Contact
        Route::get('/contact/index', [ContactFormController::class, 'index'])->name('admin.contact.index');
        Route::get('/contact/show/{id}', [ContactFormController::class, 'show'])->name('admin.contact.show');
        Route::get('/contact/destroy/{id}', [ContactFormController::class, 'destroy'])->name('admin.contact.destroy');
       
        
    });  
});
