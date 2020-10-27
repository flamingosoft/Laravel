<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAddNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\Category\NewsCategoryController;
use App\Http\Controllers\News\NewsController;
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

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contacts', "contacts")->name('contacts');
    Route::view('/vue', 'vue')->name('vue');
});

Route::prefix('/')->group(function() {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::prefix("/news")->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('home');
    Route::get('/search', [NewsController::class, 'search'])->name('search');
    Route::get('/news:{newsId}', [NewsController::class, 'news'])->name('byId');

    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [NewsCategoryController::class, 'index'])->name('home');
        Route::get('/{categorySlug}', [NewsCategoryController::class, 'getAllNewsByCategorySlug'])->name('bySlug');
    });
});

Route::prefix("/admin")->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::any('/addnews', 'Admin\AdminAddNewsController')->name('addNews');
    Route::any('/getnews', 'Admin\AdminGetNewsController')->name('getNews');
});

