<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryCRUDController;
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

    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::prefix("/news")->name('news.')->group(function () {
    //Route::get('/', [NewsController::class, 'index'])->name('home');
    Route::get('/search', [NewsController::class, 'search'])->name('search');
//    Route::get('/news:{news}', [NewsController::class, 'newsOne'])->name('byId'); // {news} -> model News send id

    Route::resource('category', 'CategoryCRUDController')
        ->names(['index' => 'category.home'])
        ->except('destroy');

    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/{category}/delete', [CategoryCRUDController::class, 'destroy'])
            ->name('destroy');
        Route::get('/slug/{categorySlug}', [NewsCategoryController::class, 'getAllNewsByCategorySlug'])
            ->name('bySlug');
    });
});

// порядок следования важен, иначе выше раздел /news/ будет воспринят как параметр, а не часть маршрута и туда будет подсовываться модель.
// в итоге получим неработающие маршруты
Route::resource('news', 'NewsCRUDController')
    ->names([
        'index' => 'news.home',
        'show' => 'news.byId'
    ]);
//    ->except('destroy');


Route::prefix("/admin")->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    //Route::any('/addnews', 'Admin\AdminAddNewsController')->name('addNews');
    Route::any('/getnews', 'Admin\AdminGetNewsController')->name('getNews');
});

