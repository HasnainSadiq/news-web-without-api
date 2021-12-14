<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminNewsController extends Controller
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
             ->orderBy('id', 'DESC')
             ->get();
             $categories=Category::all();

              return view('news.admin-index', compact('data','categories'));

    }

    public function edit(News $news, $id)
    {
        $news = News::find($id);
        $categories = Category::all();
        // dd($news->id);
        return view('news.edit', compact('news', 'categories'));
        // return $data;
    }


    public function update(Request $request, $id)
    {
        //   dd($request->all());

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
                'status'=>$request->status,
                'user_id'=>Auth::user()->id,
            ]);
        }
            else{

                News::find($id)->update([
                    'author_name'=>$request->author_name,
                    'title'=>$request->title,
                    'news'=>$request->news,
                    'status'=>$request->status,

                    'user_id'=>Auth::user()->id,
                ]);
        }


          return redirect()->route('admin.news');

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
            return redirect()->route('admin.news');
    }

}
