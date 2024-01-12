<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.blogs.')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('index');
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('show');
});

Route::name('api.categories.')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('show');
});
