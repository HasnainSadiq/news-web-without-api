<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::User()->is_admin == 1) {
            $data = Category::where('categories.created_by', Auth::user()->id)->get();
            return view('adminHome', compact('data'));
        } else {

            // $data = News::join('categories', 'categories.id', '=', 'news.category_id')
            //             ->join('users', 'users.id', 'news.user_id')
            //             ->get();

            // dd($data->all());
            $data = News::all();
            return view('home', compact('data'));
        }
    }
}
