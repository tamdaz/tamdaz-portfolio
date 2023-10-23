<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\AdministratorIP;
use App\Http\Controllers\{Admin\Resources\CategoryController,
    PageController,
    SitemapController,
    BlogController,
    Admin\AuthController,
    Admin\AdminController,
    Admin\Resources\SkillController,
    Admin\Resources\ProfileController,
    Admin\Resources\ExperienceController};

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
Route::name('pages.')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('profile', [PageController::class, 'profile'])->name('profile');

    Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

    Route::get('contact', [PageController::class, 'contact'])->name('contact');
    Route::post('contact', [PageController::class, 'contact_send'])->name('contact_send');

    // SECRET ROUTE
    Route::get('components', [PageController::class, 'components'])->name('components');

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
    Route::middleware(AdministratorIP::class)->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        /**
         * Admin Resources
         */
        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('experiences', ExperienceController::class)->except(['show']);
        Route::resource('blogs', \App\Http\Controllers\Admin\Resources\BlogController::class)
            ->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);


        /**
         * Profile
         */
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});
