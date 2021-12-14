<?php

use App\Models\News;
use app\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//All News
Route::get('/news', function () {
    return News::where('status', 'active')->get();
});


//Time
Route::get('/news/time/', function (Request $request) {
    // return $request->fromDate.' to '.$request->toDate;
    if($request->fromDate !='' && $request->toDate != ''){
        $news=News::where('status', 'active')
        ->whereDate('created_at', '>=', $request->fromDate)
        ->whereDate('created_at', '<=', $request->toDate)
        ->get();
    }else{
        $news=News::where('status', 'active')
        ->get();
    }
    return $news;
});

//Author
Route::get('/news/author/{author_id}', function (Request $request) {
    return News::where('user_id', $request->author_id)->where('status', 'active')->get();
});

//Category
Route::get('/news/category/{category_id}', function (Request $request) {
    return News::where('category_id', $request->category_id)->where('status', 'active')->get();
});



