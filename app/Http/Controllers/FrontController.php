<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class FrontController extends Controller
{
    public function index()
    {
        //$data = News::orderBy('created_at', 'DESC')->get();
        $data = News::orderBy('id', 'DESC')->where('news.status', 'active')->get();
        $categories = Category::all();
        $latestnews = News::latest()->take(5)->where('news.status', 'active')->get();
        //$mainnews=News::skip(8)->orderBy('id','DESC')->limit(1)->get();
        $oneNews = News::latest()->where('news.status', 'active')->take(1)->get();
        $secondNews = News::skip(8)->orderBy('id', 'DESC')->limit(1)->get();
        $thirdNews = News::skip(10)->orderBy('id', 'DESC')->limit(1)->get();
        $fourNews = News::skip(13)->orderBy('id', 'DESC')->limit(1)->get();
        $fiveNews = News::skip(15)->orderBy('id', 'DESC')->limit(1)->get();

        return view('frontend.body.index', compact('categories', 'data', 'latestnews', 'oneNews','secondNews', 'thirdNews','thirdNews','fourNews','fiveNews'));
    }


    public function newslist($id)
    {
        // $news = News::orderBy('created_at', 'DESC')->get();
        $news = News::where('category_id', $id)->where('news.status', 'active')->get();
        $categories = Category::all();
        $news = DB::table('news')
        ->orderBy('id', 'DESC')
            ->where('news.status', 'active')
            ->where('news.category_id', $id)
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')
            ->get();
        $latestnews = News::latest()->take(5)->where('news.status', 'active')->get();
        // dd($news);
        // $data = News::all();
        //  dd($categories->all());
        return view('newslist', compact('news', 'categories', 'latestnews'));
    }

    public function shownews($id)
    {
        $news = News::where('id', $id)->get();
        $categories = Category::all();
        $latestnews = News::latest()->take(5)->where('news.status', 'active')->get();
        return view('frontend.body.shownews', compact('news', 'categories', 'latestnews'));
    }


    public function showfullimage($id)
    {
        $news = News::where('id', $id)->get();
        $categories = Category::all();
        return view('frontend.body.showfullimage', compact('news', 'categories'));
    }
}
