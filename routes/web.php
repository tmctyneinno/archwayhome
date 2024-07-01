<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('index');

 
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
// Route::get('/projects', [ProjectController::class, 'projects'])->name('users.projects');
Route::get('projects/{type}', [ProjectController::class, 'projectsType'])->name('users.projects.type');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::get('/consultant-form', [HomeController::class, 'consultant-form'])->name('consultant-form');
// Route::get('/login', [HomeController::class, 'login'])->name('home.login');
// Route::get('/registration', [HomeController::class, 'registration'])->name('home.registration');
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('home.privacypolicy');

Route::get('/project/{id}', [HomeController::class, 'detailsProject'])->name('home.project.details');
Route::get('/post/details/{id}', [HomeController::class, 'detailsPost'])->name('post-details');
Route::post('/post/comment', [HomeController::class, 'storeComment'])->name('comments.store');

Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');

Route::get('/team/{id}', [TeamController::class, 'show'])->name('users.team.detail');
Route::get('/team', [FormController::class, 'submitForm'])->name('users.submit.form');
Route::post('/submit-inspection', [FormController::class, 'submitInspection'])->name('submit-inspection');
Route::get('/service/details/{id}', [HomeController::class, 'detailsService'])->name('service.detail');