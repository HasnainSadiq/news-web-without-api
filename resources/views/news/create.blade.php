@extends('frontend.main_master')
@section('content')


            <div class="container col-8 py-5" >
    <div class="card">
        <div class="card-header ">
            <div class="row justify-content-center">

                <div class="col- ">
                    <h2>Add News </h2>
                </div>
                 {{-- <div class="col-6 text-right">
                    <a href="{{route('home')}}" class="btn btn-dark">Back</a>
                </div> --}}
            </div>
        </div>
        <div class="card-body p-4">
            @guest
            <form action="{{ route('guest-news.store') }}" method="POST" enctype="multipart/form-data">
            @endguest

            @auth
            @if(auth()->user()->is_admin == 1)
            <form action="{{ route('admin-news.store') }}" method="POST" enctype="multipart/form-data">
                @else
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @endif
            @endauth


{{--
            @if(auth()->user()->is_admin == 0)
            {
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            }
            @else
            {
             <form action="{{ route('guest-news.store') }}" method="POST" enctype="multipart/form-data">
            }
            @endif --}}
                @csrf
                <div class="form-group ">
                    <label for="formGroupExampleInput" class="col-md- col-form-label text-md-right"><h5>Author Name</h5></label>
                    @guest
                    <input type="text" class="form-control"  id="formGroupExampleInput"
                    name="author_name">
                    @endguest

                    @auth
                    <input type="text" class="form-control" readonly value="{{ Auth::user()->name }}" id="formGroupExampleInput"
                    name="author_name">
                    @endauth

                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput"><h5>News Title</h5></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="Enter Your Title">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><h5>News</h5></label>
                    <br>
                    <textarea  name="news" rows="3" cols="91" id="description" placeholder="Enter Your News"></textarea>
                </div>

                {{-- <div class="form-group">
                    <label for="formGroupExampleInput">News</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="news" placeholder="Enter Your News">
                </div><br> --}}



                <div class="form-group">
                    <label for="formGroupExampleInput"><h5>News Image</h5></label>
                    <input type="file" class="form-control"  name="image"
                    >
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><h5>Select your category</h5></label>
                    <select class="form-control" id="formGroupExampleInput" name="category_id" aria-label="Default select example">
                        <option value=""> Click Here</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
