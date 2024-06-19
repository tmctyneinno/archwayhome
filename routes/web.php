<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contactus'])->name('contact');

Route::get('/consultant-form', [HomeController::class, 'consultant-form'])->name('consultant-form');
// Route::get('/login', [HomeController::class, 'login'])->name('home.login');
// Route::get('/registration', [HomeController::class, 'registration'])->name('home.registration');
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('home.privacypolicy');
