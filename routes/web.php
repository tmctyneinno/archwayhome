<?php

use App\Http\Controllers\BookInspection;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\ConsultantFormController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FAQController;
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
Route::get('projects/{type}', [ProjectController::class, 'projectsType'])->name('users.projects.type');
Route::post('/consultant-form', [ConsultantFormController::class, 'store'])->name('consultant-form.store');
Route::post('/book-inspection', [BookInspection::class, 'store'])->name('book-inspection.store');

// Route::get('/login', [HomeController::class, 'login'])->name('home.login');
// Route::get('/registration', [HomeController::class, 'registration'])->name('home.registration');
Route::get('/project/{id}', [HomeController::class, 'detailsProject'])->name('home.project.details');
Route::get('/post/details/{id}', [HomeController::class, 'detailsPost'])->name('post-details');
Route::post('/post/comment', [HomeController::class, 'storeComment'])->name('comments.store');

Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');

Route::get('/team/{id}', [TeamController::class, 'show'])->name('users.team.detail'); 
Route::get('/team', [FormController::class, 'submitForm'])->name('users.submit.form');
Route::post('/submit-inspection', [FormController::class, 'submitInspection'])->name('submit-inspection');
Route::get('/service/details/{id}', [HomeController::class, 'detailsService'])->name('service.detail');
Route::post('/contact/store', [ContactFormController::class, 'store'])->name('contact.store');
Route::post('/faq/store', [FAQController::class, 'submitForm'])->name('submit.faq.form');
Route::get('/reload/captcha', [CaptchaController::class, 'reloadCaptcha'])->name('reload.captcha');


