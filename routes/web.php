<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MainController;
use App\Models\User;
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

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('news');
    Route::get('/create', [ArticleController::class, 'create'])->name('article-create');
    Route::get('/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article-edit');
    Route::post('/store', [ArticleController::class, 'store'])->name('article-store');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('article-update');
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('article-show');
    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('article-destroy');
});

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', [CarController::class, 'index'])->name('catalog');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/{car}', [CarController::class, 'show'])->name('product-show');
});


