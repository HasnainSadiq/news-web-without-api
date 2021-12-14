<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = News::where('news.user_id', Auth::user()->id)->orderBy('id', 'DESC')
        ->get();
        $categories=Category::all();

        // $dogs = News::latest()->take(5)->get();

        // $data = News::orderBy('id', 'desc')->take(5)->get();
        //  dd($dogs);

        // dd($data[0]->news);
        return view('news.index', compact('data','categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $req->status='active';
        $req->user_id = Auth::user()->id;
        if($request->file('image'))
            {
                $file=$request->file('image');
                // @unlink(public_path('upload/newsimage/'.$req->image));
                $filename=date('YmdHi').".".$file->getClientOriginalExtension();
                $file->move(public_path('upload/newsimage/'),$filename);
                $req['image']=$filename;

            }
        $req->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, $id)
    {
        $news = News::find($id);
        $categories = Category::all();
        // dd($news->id);
        return view('news.edit', compact('news', 'categories'));
        // return $data;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          // dd($request->all());

          if($request->file('image'))
          {
              $file=$request->file('image');
              // @unlink(public_path('upload/newsimage/'.$req->image));
              $filename=date('YmdHi').".".$file->getClientOriginalExtension();
              $file->move(public_path('upload/newsimage/'),$filename);
              $req['image']=$filename;
              News::find($id)->update([
                'author_name'=>$request->author_name,
                'title'=>$request->title,
                'news'=>$request->news,
                'user_id'=>Auth::user()->id,
            ]);
        }


            else{

                News::find($id)->update([
                    'author_name'=>$request->author_name,
                    'title'=>$request->title,
                    'news'=>$request->news,
                    'user_id'=>Auth::user()->id,
                ]);

                }


        //   $req = News::find($id);
        //   $req->author_name=$request->author_name;
        //   $req->title=$request->title;
        //   $req->news=$request->news;
        //   $req->category=$request->category;
        //   $req->user_id = Auth::user()->id;

        //   $req->update();
          return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::find($id);
            $data->delete();
            return redirect()->route('news.index');
    }
}
