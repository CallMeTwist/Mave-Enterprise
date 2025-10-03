<?php

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

//Route::prefix('core')->group(function() {
//    Route::get('/', 'CoreController@index');
//});

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\WebsiteController;





Route::get('/', [WebsiteController::class, 'home'])->name('welcome');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/faqs', [WebsiteController::class, 'faqs'])->name('faqs');
Route::get('/testimonials', [WebsiteController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'contact_send'])->name('contact.send');
Route::get('/projects', [WebsiteController::class, 'projects'])->name('projects');
Route::get('/events', [WebsiteController::class, 'events'])->name('events');
Route::get('/events/{code}', [WebsiteController::class, 'viewEvent'])->name('events.view');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('/volunteers', [WebsiteController::class, 'volunteer'])->name('volunteer');
Route::post('/volunteers', [WebsiteController::class, 'volunteer_send'])->name('volunteer.send');
