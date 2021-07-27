<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
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

/* Static Pages */
Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/financial-department', [PageController::class, 'financial'])->name('financial');
Route::get('/terms-of-sales', [PageController::class, 'sales'])->name('sales');
Route::get('/for-clients', [PageController::class, 'clients'])->name('clients');

Route::resource('articles', ArticleController::class);

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', [CarController::class, 'index'])->name('products.index');
    Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/{car}', [CarController::class, 'show'])->name('products.show');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
