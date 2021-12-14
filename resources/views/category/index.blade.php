@extends('frontend.main_master')
@section('title', 'view')
@section('content')
    <div class="container-fluid pt-3 ">
        <div class="container animate-box py-5" data-animate-effect="fadeIn">
            {{-- <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Category   <a href="{{ route('category.create') }}" class="btn btn-dark">Create <i
                    class="fa fa-plus"></i></a>
                <a href="{{ route('admin.news') }}" class="btn btn-secondary"> News</a></div>

                    </div> --}}

            <div class="owl-carousel owl-theme js" id="slider1">

                @foreach ($data as $data)
                    <div class="item">
                        <a href="#">
                            <div class="card fh5co_latest_trading_img_position_relative"
                                style="width: 15rem; height: 200px;">

                                <div class="card-body ">
                                    <div class="news-card">
                                        <img class="card-img-top   fh5co_latest_trading_img"
                                            src="{{ asset('upload/categoryImage/' . $data->category_image) }}"
                                            alt="Card image cap" style="height:143px !important;">
                                        <div class="overlay">
                                            <a href="{{ route('category.edit', $data->id) }}"
                                                class="btn btn-warning btn-sm mr-2"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('category.delete', $data->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <p class="pt-2 px-2 mb-0">{{ substr($data->title, 0, 25) }}</p>
                                    <p class="pt-2 px-2 mb-0">{{ substr($data->description, 0, 40) }}</p>





                                </div>

                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection











{{-- @extends('frontend.main_master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h2>category</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('category.create') }}" class="btn btn-dark">Create <i
                            class="fa fa-plus"></i></a>
                        <a href="{{ route('admin.news') }}" class="btn btn-secondary"> News</a>


                    </div>

                </div>
            </div>
            <div class="table-1">
                <table class="table table-dark">
                    <thead class=" navbar-dark bg-primary">
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>description</th>
                            <th>Image</th>
                            <th>created_by</th>
                            <th colspan="2"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $dt['id'] }}</td>
                                <td>{{ $dt['title'] }}</td>
                                <td>{{substr($dt['description'],0,40) }}</td>
                                <td><img src="{{asset('upload/categoryImage/' . $dt->category_image)}}"style='width:75px;' alt=""></td>
                                <td>{{ $dt['created_by'] }}</td>
                                <td><a href="{{ route('category.edit', $dt->id) }}"
                                    class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                <td><a href="{{ route('category.delete', $dt->id) }}"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection --}}
