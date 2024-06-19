<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;



Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/manage/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/manage/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth.admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        // Menu
        Route::get('/menu/create', [AdminController::class, 'creatMenu'])->name('admin.menu.create');
        Route::get('/manage/menuIndex', [AdminController::class, 'indexMenu'])->name('admin.menu.index');
        Route::post('/menu', [AdminController::class, 'storeMenu'])->name('admin.menu.store');
        Route::get('/menu/{id}/edit', [AdminController::class, 'editMenu'])->name('admin.menu.edit');
        Route::put('/menu/{id}', [AdminController::class, 'updateMenu'])->name('admin.menu.update');
        Route::get('/menu/{id}', [AdminController::class, 'destroyMenu'])->name('admin.menu.destroy');
        //Slider
        Route::get('/manage/sliderIndex', [AdminController::class, 'indexSlider'])->name('admin.slider.index');
        Route::get('/manage/sliderCreate', [AdminController::class, 'createSlider'])->name('admin.slider.create');
        Route::post('/slider', [AdminController::class, 'storeSlider'])->name('slider.store');
        Route::get('/slider/{id}/edit', [AdminController::class, 'editSlider'])->name('admin.slider.edit');
        Route::put('/slider/{id}', [AdminController::class, 'updateSlider'])->name('admin.slider.update');
        Route::get('/slider/{id}', [AdminController::class, 'destroySlider'])->name('admin.slider.destroy');

    });
});