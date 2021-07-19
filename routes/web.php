<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

/* Main Page */
Route::get('/', [MainController::class, 'index'])->name('main');

/* Static Pages */
Route::group([], function () {
    Route::get('/about', function () {
        return view('pages.about');
    })->name('about');
    Route::get('/contacts', function () {
        return view('pages.contacts');
    })->name('contacts');
    Route::get('/financial-department', function () {
        return view('pages.financial-department');
    })->name('financial');
    Route::get('/terms-of-sales', function () {
        return view('pages.sales');
    })->name('sales');
    Route::get('/for-clients', function () {
        return view('pages.clients');
    })->name('clients');
});

Route::group([], function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('news');
});

