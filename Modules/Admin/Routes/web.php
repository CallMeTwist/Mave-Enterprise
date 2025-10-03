<?php


use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Auth\LoginController;
use Modules\Admin\Http\Controllers\Dashboard\DashboardController;
use Modules\Admin\Http\Controllers\Dashboard\EventsController;
use Modules\Admin\Http\Controllers\Dashboard\FaqsController;
use Modules\Admin\Http\Controllers\Dashboard\GalleryController;
use Modules\Admin\Http\Controllers\Dashboard\PartnersController;
use Modules\Admin\Http\Controllers\Dashboard\ProjectController;
use Modules\Admin\Http\Controllers\Dashboard\TeamController;
use Modules\Admin\Http\Controllers\Dashboard\TestimonialsController;
use Modules\Admin\Http\Controllers\Dashboard\Settings\AccountsController;
use Modules\Admin\Http\Controllers\Dashboard\Settings\ProfileController;
use Modules\Admin\Http\Controllers\Dashboard\Settings\SettingsController;

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



Route::prefix('admin')->name('admin.')->group(function () {

    // AUTH ROUTES
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // DASHBOARD ROUTES (authenticated)
    Route::middleware('auth:web')->prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('home');

        // SETTINGS
        Route::prefix('settings')->name('settings.')->group(function () {

            // PROFILE
            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('manage');
                Route::post('/update', [ProfileController::class, 'update'])->name('update');
                Route::post('/password', [ProfileController::class, 'password'])->name('password');
            });

            Route::get('/manage', [SettingsController::class, 'index'])->name('manage');
            Route::post('/manage', [SettingsController::class, 'save'])->name('save');

            // BANK ACCOUNTS
            Route::prefix('accounts')->name('accounts.')->group(function () {
                Route::post('/save', [AccountsController::class, 'save'])->name('save');
                Route::post('/update', [AccountsController::class, 'update'])->name('update');
                Route::post('/delete', [AccountsController::class, 'delete'])->name('delete');
            });
        });

        // TESTIMONIALS
        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/', [TestimonialsController::class, 'index'])->name('manage');
            Route::post('/save', [TestimonialsController::class, 'save'])->name('save');
            Route::post('/update', [TestimonialsController::class, 'update'])->name('update');
            Route::post('/delete', [TestimonialsController::class, 'delete'])->name('delete');
        });

        // FAQS
        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::get('/', [FaqsController::class, 'index'])->name('manage');
            Route::post('/save', [FaqsController::class, 'save'])->name('save');
            Route::post('/update', [FaqsController::class, 'update'])->name('update');
            Route::post('/delete', [FaqsController::class, 'delete'])->name('delete');
        });

        // TEAM
        Route::prefix('team')->name('team.')->group(function () {
            Route::get('/', [TeamController::class, 'index'])->name('manage');
            Route::post('/save', [TeamController::class, 'save'])->name('save');
            Route::post('/update', [TeamController::class, 'update'])->name('update');
            Route::post('/delete', [TeamController::class, 'delete'])->name('delete');
        });

        // PARTNERS
        Route::prefix('partners')->name('partners.')->group(function () {
            Route::get('/', [PartnersController::class, 'index'])->name('manage');
            Route::post('/save', [PartnersController::class, 'save'])->name('save');
            Route::post('/update', [PartnersController::class, 'update'])->name('update');
            Route::post('/delete', [PartnersController::class, 'delete'])->name('delete');
        });

        // PROJECTS
        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('manage');
            Route::post('/save', [ProjectController::class, 'save'])->name('save');
            Route::post('/update', [ProjectController::class, 'update'])->name('update');
            Route::post('/delete', [ProjectController::class, 'delete'])->name('delete');
        });

        // EVENTS
        Route::prefix('events')->name('events.')->group(function () {
            Route::get('/', [EventsController::class, 'index'])->name('manage');
            Route::post('/save', [EventsController::class, 'save'])->name('save');
            Route::post('/update', [EventsController::class, 'update'])->name('update');
            Route::post('/delete', [EventsController::class, 'delete'])->name('delete');
        });

        // GALLERY
        Route::prefix('galleries')->name('galleries.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('manage');
            Route::post('/save', [GalleryController::class, 'save'])->name('upload');
            Route::post('/update', [GalleryController::class, 'update'])->name('update');
            Route::post('/delete', [GalleryController::class, 'delete'])->name('delete');
        });
    });
});





//Route::prefix('admin')->group(function() {
//    Route::get('/', 'AdminController@index');
//});
