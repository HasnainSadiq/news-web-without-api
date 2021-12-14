@extends('frontend.main_master')
@section('content')
    <div class="container col-6 py-4">
        <div class="card ">
            <div class="card-header"><h5>Add New Category</h5></div>
            <div class="card-body p-4 ">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Enter Category title</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                            placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Description</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="description"
                            placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category Image</label>
                        <input type="file" class="form-control"  name="image"
                            >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
