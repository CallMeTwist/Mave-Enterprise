<?php

use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\Dashboard\DashboardController;
use App\Http\Controllers\Panel\Dashboard\EventsController;
use App\Http\Controllers\Panel\Dashboard\GalleryController;
use App\Http\Controllers\Panel\Dashboard\Settings\AccountsController;
use App\Http\Controllers\Panel\Dashboard\Settings\ProfileController;
use App\Http\Controllers\Panel\Dashboard\Settings\SettingsController;
use App\Http\Controllers\Panel\Dashboard\FaqsController;
use App\Http\Controllers\Panel\Dashboard\PartnersController;
use App\Http\Controllers\Panel\Dashboard\ProjectController;
use App\Http\Controllers\Panel\Dashboard\TeamController;
use App\Http\Controllers\Panel\Dashboard\TestimonialsController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::get('gizmo/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::namespace('Panel')->group(function() {
    Route::group(['prefix' => 'panel', 'as' => 'panel.', ], function(){

        Route::namespace('Auth')->group(function() {
            Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [LoginController::class, 'login'])->name('login.post');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        });

        Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:web', 'namespace' => 'Dashboard'], function(){

            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            /** Settings Routes */
            Route::group(['prefix' => 'settings', 'as' => 'settings.', 'namespace' => 'Settings'], function(){

                /** Profile Routes */
                Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
                    Route::get('/', [ProfileController::class, 'index'])->name('manage');
                    Route::post('/update', [ProfileController::class, 'update'])->name('update');
                    Route::post('/password', [ProfileController::class, 'password'])->name('password');
                });

                /** Settings Routes */
                Route::get('/manage', [SettingsController::class, 'index'])->name('manage');
                Route::post('/manage', [SettingsController::class, 'save'])->name('save');

                //Bank Account Routes
                Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function(){
                    Route::post('/save', [AccountsController::class, 'save'])->name('save');
                    Route::post('/update', [AccountsController::class, 'update'])->name('update');
                    Route::post('/delete', [AccountsController::class, 'delete'])->name('delete');
                });
            });

            /** Testimonials Routes */
            Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function(){
                Route::get('/', [TestimonialsController::class, 'index'])->name('manage');
                Route::post('/save', [TestimonialsController::class, 'save'])->name('save');
                Route::post('/update', [TestimonialsController::class, 'update'])->name('update');
                Route::post('/delete', [TestimonialsController::class, 'delete'])->name('delete');
            });

            /** FAQs Routes */
            Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function(){
                Route::get('/', [FaqsController::class, 'index'])->name('manage');
                Route::post('/save', [FaqsController::class, 'save'])->name('save');
                Route::post('/update', [FaqsController::class, 'update'])->name('update');
                Route::post('/delete', [FaqsController::class, 'delete'])->name('delete');
            });

            /** Team Routes */
            Route::group(['prefix' => 'team', 'as' => 'team.'], function(){
                Route::get('/', [TeamController::class, 'index'])->name('manage');
                Route::post('/save', [TeamController::class, 'save'])->name('save');
                Route::post('/update', [TeamController::class, 'update'])->name('update');
                Route::post('/delete', [TeamController::class, 'delete'])->name('delete');
            });

            /** Brand Routes */
            Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
                Route::get('/', [PartnersController::class, 'index'])->name('manage');
                Route::post('/save', [PartnersController::class, 'save'])->name('save');
                Route::post('/update', [PartnersController::class, 'update'])->name('update');
                Route::post('/delete', [PartnersController::class, 'delete'])->name('delete');
            });

            /** Projects Routes */
            Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
                Route::get('/', [ProjectController::class, 'index'])->name('manage');
                Route::post('/save', [ProjectController::class, 'save'])->name('save');
                Route::post('/update', [ProjectController::class, 'update'])->name('update');
                Route::post('/delete', [ProjectController::class, 'delete'])->name('delete');
            });

            /** Events Routes */
            Route::group(['prefix' => 'events', 'as' => 'events.'], function(){
                Route::get('/', [EventsController::class, 'index'])->name('manage');
                Route::post('/save', [EventsController::class, 'save'])->name('save');
                Route::post('/update', [EventsController::class, 'update'])->name('update');
                Route::post('/delete', [EventsController::class, 'delete'])->name('delete');
            });

            /** Gallery Routes */
            Route::group(['prefix' => 'galleries', 'as' => 'galleries.'], function(){
                Route::get('/', [GalleryController::class, 'index'])->name('manage');
                Route::post('/save', [GalleryController::class, 'save'])->name('upload');
                Route::post('/update', [GalleryController::class, 'update'])->name('update');
                Route::post('/delete', [GalleryController::class, 'delete'])->name('delete');
            });

        });
    });
});

