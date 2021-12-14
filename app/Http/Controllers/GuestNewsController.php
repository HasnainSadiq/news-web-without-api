<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestNewsController extends Controller
{
    public function index()
    {
        $data = News::where('user_id','0')->get();
        // $data = DB::table('news')
        //     ->where('news.user_id','0')
        //     ->select('news.*')
        //     ->get();
            //  dd($data);
             return view('news.admin-index',compact('data'));
    }

    public function index1()
    {

        $data = News::where('news.user_id', Auth::user()->id)->get();
        // dd($data[0]->news);
        return view('news.index', compact('data'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('news.create' , compact('categories'));
    }

    /**
     * tore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $req = new News;
        $req->author_name=$request->author_name;
        $req->title=$request->title;
        $req->news=$request->news;
        $req->category_id =$request->category_id;
        // $req->user_id=$request->user_id;
        $req->status='inactive';

        $req->user_id = 0;
        if($request->file('image'))
            {
                $file=$request->file('image');
                // @unlink(public_path('upload/newsimage/'.$req->image));
                $filename=date('YmdHi').".".$file->getClientOriginalExtension();
                $file->move(public_path('upload/newsimage/'),$filename);
                $req['image']=$filename;

            }
            // dd($req);
        $req->save();


        return redirect()->route('guest-news.index');


    }

}
