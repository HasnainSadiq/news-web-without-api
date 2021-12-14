<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewAllNewsController extends Controller
{
    public function index()
    {
        // $data =News::join('categories', 'categories.id', '=', 'news.category_id')
        //     ->join('users', 'users.id', '=', 'news.user_id')
        //     ->select('news.*', 'users.name','categories.title as category_title')
        //     ->get();
        // return view('news.admin-index', compact('data'));

        $data =News::join('categories', 'categories.id', '=', 'news.category_id')
             ->select('news.*', 'categories.title as category_title')
             ->get();

        // dd($data);
              return view('view-all-news-index', compact('data', 'categories',''));

    }
    // public function index($id)
    // {
    //     $news = News::where('category_id', $id)->where('news.status','active')->get();
    //     $categories = Category::all();

    //     $news = DB::table('news')
    //         ->where('news.status','active')
    //         ->where('news.category_id',$id)
    //         ->join('categories', 'categories.id', '=', 'news.category_id')
    //         ->select('news.*','categories.title as category_title')
    //         ->get();
    //         return view('view-all-news-index', compact('data', 'categories',''));
    //     }


}
