<?php

use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuestNewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewAllNewsController;
use App\Models\News;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/{id}', [FrontController::class, 'index'])->name('index');
Route::get('/', [FrontController::class, 'index'])->name('index');



// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('admin');

Route::middleware(['auth', 'admin'])->group(function () {
    //Categories
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');

    //Admim News

    Route::get('guest-news',[GuestNewsController::class,'index'])->name('guest-news.index');
    // Route::get('news',[GuestNewsController::class,'index1'])->name('news.index');

    Route::get('/admin/news/create',[NewsController::class,'create'])->name('admin-news.create');
    Route::post('/admin/news/store',[NewsController::class,'store'])->name('admin-news.store');
    Route::get('/admin/news/edit/{id}',[AdminNewsController::class,'edit'])->name('admin.news.edit');
    Route::post('/admin/news/update/{id}',[AdminNewsController::class,'update'])->name('admin.news.update');
    Route::get('/admin/news/delete/{id}',[AdminNewsController::class,'destroy'])->name('admin.news.delete');
    Route::get('/admin/news',[AdminNewsController::class,'index'])->name('admin.news');


    Route::get('/user/management',[UserController::class,'index'])->name('user.management');
    Route::post('/user/management/store',[UserController::class,'create'])->name('user-management.store');


});

Route::middleware(['auth','user'])->group(function () {
    //News
    Route::get('my-news',[NewsController::class,'index'])->name('news.index');
    Route::get('news/create',[NewsController::class,'create'])->name('news.create');
    Route::post('/news/store',[NewsController::class,'store'])->name('news.store');
    Route::get('/news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
    Route::post('/news/update/{id}',[NewsController::class,'update'])->name('news.update');
    Route::get('/news/delete/{id}',[NewsController::class,'destroy'])->name('news.delete');
});

//catagory routs
    // Route::get('/newslist', function () {
    //     return News::all();
    // });
  Route::get('/newslist/view/{id}',[FrontController::class,'newslist'])->name('newslist.view');
Route::get('/show/news/{id}',[FrontController::class,'shownews'])->name('show.news');
Route::get('/show/image/{id}',[FrontController::class,'showfullimage'])->name('show.image');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('my-news',[NewsController::class,'index'])->name('news.index');

Route::get('guest-news',[GuestNewsController::class,'index'])->name('guest-news.index');

Route::get('guest-news/create',[GuestNewsController::class,'create'])->name('guest-news.create');
Route::post('guest-news/store', [GuestNewsController::class,'store'])->name('guest-news.store');
// Route::view('view-all-news',[GuestNewsController::class,'index'])->name('guest-news.index');

Route::get('view/all/news',[ViewAllNewsController::class,'index'])->name('view-all-news');


