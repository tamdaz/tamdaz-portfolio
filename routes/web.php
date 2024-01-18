<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
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

/**
 * This route group is accessible for everyone
 */
Route::name('pages.')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('home');

    Route::get('bts-sio', [BlogController::class, 'btssio'])->name('bts-sio');

    Route::get('certifications', [PageController::class, 'certifications'])->name('certifications');
    Route::get('technology-watch', [PageController::class, 'technology_watch'])->name('tw');

    Route::get('reports', [PageController::class, 'reports'])->name('reports');

    Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

    Route::get('contact', [PageController::class, 'contact'])->name('contact');
    Route::post('contact', [PageController::class, 'contact_send'])
        ->name('contact_send')
        ->middleware('throttle:contact');

    // SECRET ROUTE
    Route::get('components', [PageController::class, 'components'])->name('components');

    Route::get('/sitemap', function () {
        [
            $categories_blogs,
            $categories_reports,
            $tw
        ] = [
            App\Models\Category::with('blogs')->usedForBlogs()->get(),
            App\Models\Category::with('reports')->usedForReports()->get(),
            App\Models\TW::all(),
        ];

        return view('sitemap', compact('categories_blogs', 'categories_reports', 'tw'));
    })->name('sitemap');
});
