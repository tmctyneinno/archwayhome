<?php

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
use App\Http\Controllers\TermsCondition;



Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/manage/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/manage/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth.admin')->group(function () {
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
        Route::get('/manage/sliderIndex', [AdminController::class, 'indexSlider'])->name('admin.slider.index');
        Route::get('/manage/sliderCreate', [AdminController::class, 'createSlider'])->name('admin.slider.create');
        Route::post('/slider', [AdminController::class, 'storeSlider'])->name('slider.store');
        Route::get('/slider/{id}/edit', [AdminController::class, 'editSlider'])->name('admin.slider.edit');
        Route::put('/slider/{id}', [AdminController::class, 'updateSlider'])->name('admin.slider.update');
        Route::get('/slider/{id}', [AdminController::class, 'destroySlider'])->name('admin.slider.destroy');
        //Why choose us
        Route::get('/settings/content', [SettingsController::class, 'WhyChooseUs'])->name('admin.settings.content');
        Route::post('/settings/store/why-choose-us', [SettingsController::class, 'storeWhyChooseUs'])->name('admin.settings.store_why_choose_us');
        Route::put('/settings/update/why-choose-us/{id}', [SettingsController::class, 'updateWhyChooseUs'])->name('admin.settings.update_why_choose_us');
        //About us
        Route::post('/settings/store/about-us', [SettingsController::class, 'storeAboutUs'])->name('admin.settings.storeAboutus');
        Route::put('/settings/update/about-us/{id}', [SettingsController::class, 'updateAboutUs'])->name('admin.settings.updateAboutus');
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
        Route::post('/terms/conditions/store/', [TermsCondition::class, 'store'])->name('admin.privacy.store');
        Route::put('/terms/conditions/update/{id}', [TermsCondition::class, 'update'])->name('admin.privacy.update');
         
    });
});
