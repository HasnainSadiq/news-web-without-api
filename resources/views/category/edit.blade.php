{{-- @extends('layouts.app')

@section('content') --}}
@extends('frontend.main_master')

@section('content')
    <div class="container col-6 py-5">
        <div class="card">
            <div class="card-header">update Category</div>
            <div class="card-body p-3">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="formGroupExampleInput">Enter Category title</label>
                        <input type="text" class="form-control" value="{{$category->title}}" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Description</label>
                        <input type="text" class="form-control" value="{{$category->description}}" name="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category Image</label>
                        <input type="file" class="form-control" value="{{$category->category_image}}" name="image">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection








