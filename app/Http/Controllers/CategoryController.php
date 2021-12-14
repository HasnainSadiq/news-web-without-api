<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller



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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = Category:: where('categories.created_by', Auth::user()->id)->get();
            $categories =Category::all();
            // dd($data);
                return view('category.index', compact('data','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.create' , compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $req = new Category();
        $req->title=$request->title;
        $req->description=$request->description;
        $req->created_by= Auth::user()->id;
        if($request->file('image'))
        {
            $file=$request->file('image');
            // @unlink(public_path('upload/newsimage/'.$req->image));
            $filename=date('YmdHi').".".$file->getClientOriginalExtension();
            $file->move(public_path('upload/categoryImage/'), $filename);
            $req['category_image']=$filename;

        }
        $req->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories =Category::all();
        return view('category.edit', compact('category','categories'));
        // return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $req = Category::find($id);
        $req->title=$request->title;
        $req->description=$request->description;
        $req->created_by= Auth::user()->id;
        // return $request->file('image');
        if($request->file('image'))
        {
            $file=$request->file('image');
            // @unlink(public_path('upload/newsimage/'.$req->image));
            $filename=date('YmdHi').".".$file->getClientOriginalExtension();
            $file->move(public_path('upload/categoryImage/'), $filename);
            $req['category_image']=$filename;

        }
        $req->update();

          return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category,$id)
    {
        $categories =Category::all();
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('category.index');
    }
}
