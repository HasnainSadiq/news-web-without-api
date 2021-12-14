{{-- @extends('layouts.app')
@section('title', 'Edit')
@section('content') --}}
@extends('frontend.main_master')
@section('content')
    <div class="container">


    <div class="card mt-5">
        <div class="card-header">
            <div class="row ">
                <div class="col-6">
                    <h2>Edit News </h2>
                </div>
                <div class="col-6 text-right">
                    <a href="/" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body p-5">


            @if (auth()->user()->is_admin == 1)
                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @else
               <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @endif

                    @csrf

                    <div class="form-group">
                        <label for="formGroupExampleInput">Author Name</label>
                        <input type="text" class="form-control" value="{{ $news->author_name }}" id="formGroupExampleInput"
                            name="author_name" placeholder="Enter author Name">
                    </div><br>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" value="{{ $news->title }}" id="formGroupExampleInput"
                            name="title" placeholder="Enter Your Title">
                    </div><br>

                    <div class="form-group">
                        <label for="formGroupExampleInput">News</label>
                        <br>
                        <textarea name="news" class="form-control" id="description" rows="6" cols="150" placeholder="Enter Your News"> "{{ $news->news }}"  </textarea>
                        {{-- <input type="text" class="form-control" value="{{ $news->news }}" id="formGroupExampleInput"
                            name="news" placeholder="Enter Your News"> --}}
                    </div><br>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Image</label>
                        <input type="file" class="form-control-file" value="{{ $news->image }}" id="formGroupExampleInput"
                            name="image" placeholder="select Your image">
                    </div><br>



                    {{-- @if (auth()->user()->is_admin == 1)
<div class="form-group">
    <label for="formGroupExampleInput">Status</label>
    <input type="text" class="form-control" value="{{$news->status}}" name="status">
</div>
@endif --}}

                    @if (auth()->user()->is_admin == 1)
                        <div class="form-group">
                            <label for="formGroupExampleInput">Select Status</label>
                            <select class="form-control" name="status" aria-label="Default select example">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                {{-- <input type="text"  value="{{$news->status}}" name="status"> --}}
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="formGroupExampleInput">Select your category</label>
                        <select class="form-control" id="formGroupExampleInput" name="category"
                            aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>


        </div>
    </div>
</div>
@endsection
