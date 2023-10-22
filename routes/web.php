<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\{AdminController, AuthController};
use App\Http\Controllers\Admin\Resources\{
	BlogController, ExperienceController, ProfileController, ProjectController, SkillController
};

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

/**
 * This route group is accessible for everyone
 */
Route::controller(PageController::class)->name('pages.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('profile', 'profile')->name('profile');
    Route::get('skills', 'skills')->name('skills');
    Route::get('experiences', 'experiences')->name('experiences');
    Route::get('projects', 'projects')->name('projects');
    Route::get('projects/{id}', 'project_show')->name('projects.show');
    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('blogs/{id}', 'blog_show')->name('blogs.show');
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact', 'contact_send')->name('contact_send');

    // SECRET ROUTE
    Route::get('components', 'components')->name('components');

    Route::get('/sitemap', function () {
        if (!file_exists(public_path('sitemap.xml'))) {
            Artisan::call('app:generate-sitemap');
        }

        return view('sitemap', [
            'sitemap' => simplexml_load_file(public_path('sitemap.xml'))
        ]);
    })->name('sitemap');
});

/**
 * This route group is reserved for administrators
 */
Route::prefix('admin')->name('admin.')->group(function () {
    /**
     * Admin Page
     */
    Route::middleware('auth')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        /**
         * Admin Resources
         */
        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('experiences', ExperienceController::class)->except(['show']);
        Route::resource('projects', ProjectController::class)->except(['show']);
        Route::resource('blogs', BlogController::class)->except(['show']);

        /**
         * Profile
         */
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    });

    /**
     * Authentification
     */
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('login', [AuthController::class, 'login_page'])->name('login_page');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});