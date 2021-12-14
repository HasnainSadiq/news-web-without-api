@extends('frontend.main_master')
@section('content')
    <style>
        .card {
            border-radius: 10px;
        }

        .card-img-top:hover {
            opacity: 0.3;
        }

        .card-title {
            color: black;
        }

    </style>



<div class="container-fluid paddding mb-5 my-5 mx-3">
    <div class="row ">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            @foreach ($oneNews as $news)
            <a href="{{ route('show.news', $news->id) }}">

            <div class="fh5co_suceefh5co_height"><img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="img" />
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class="color_fff">
                        <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                    </div>
                    <div class="fh5co_good_font">
                        <p class="card-title " style="font-size:20px; color:#cbccce">
                            {{ substr($news->title, 0, 100) }} </p>
                    </div>
            </div>
        </div>
            </a>
            @endforeach
        </div>
        <div class="col-md-6 ">
            <div class="row  ">
                <div class="col-md-6 col-6  paddding animate-box" data-animate-effect="fadeIn">
                    @foreach ($secondNews as $news)
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="color_fff"> <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="fh5co_good_font_2">
                                    <p class="card-title" style="font-size:15px; color:#cbccce">
                                        {{ substr($news->title, 0, 25) }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    @foreach ($thirdNews as $news)
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="color_fff"> <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="fh5co_good_font_2">
                                    <p class="card-title" style="font-size:15px; color:#cbccce">
                                        {{ substr($news->title, 0, 25) }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    @foreach ($fourNews as $news)
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="color_fff"> <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="fh5co_good_font_2">
                                    <p class="card-title" style="font-size:15px; color:#cbccce">
                                        {{ substr($news->title, 0, 25) }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    @foreach ($fiveNews as $news)
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="color_fff"> <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('show.news', $news->id) }}" class="fh5co_good_font_2">
                                    <p class="card-title" style="font-size:15px; color:#cbccce">
                                        {{ substr($news->title, 0, 25) }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>










    <div class="container-fluid pt-3 ">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Category</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach ($categories as $cat)
                    <div class="item px-2">
                        <a href="{{ route('newslist.view', $cat->id) }}">
                            <div class="card fh5co_latest_trading_img_position_relative"
                                style="width: 15rem; height: 200px;">
                                <div class="card-body">
                                    <div class="news-card">
                                        <img class="card-img-top fh5co_latest_trading_img"
                                            src="{{ asset('upload/categoryImage/' . $cat->category_image) }}"
                                            alt="Card image cap" style="height:144px !important;">
                                        @auth
                                            @if (Auth::user()->is_admin)
                                                <div class="overlay">
                                                    <a href="{{ route('category.edit', $cat->id) }}"
                                                        class="btn btn-warning btn-sm mr-2"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('category.delete', $cat->id) }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="card-title"> {{ $cat->title }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    <div class="row pb-4">
                        @foreach ($data as $data)
                            <div class="item px-2 mb-3 col-4">
                                <a href="{{ route('show.news', $data->id) }}">
                                    <div class="card fh5co_latest_trading_img_position_relative"
                                        style="width: 15rem; height: 200px;">
                                        <img class="card-img-top fh5co_latest_trading_img"
                                            src="{{ asset('upload/newsimage/' . $data->image) }}" alt="Card image cap">
                                        <div class="card-footer">
                                            <p class="card-title mb-0">{{ substr($data->title, 0, 40) }}</p>
                                            <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                                {{ $data->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight" >
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py- mb-3">Latest News</div>
                    </div>

                    @foreach ($latestnews as $data)
                        <div class="row pb-4">
                            <div class="col-5 align-self-center">
                                <a href="{{ route('show.news', $data->id) }}">
                                    <img src="{{ asset('upload/newsimage/' . $data->image) }}" alt="img"
                                        class="fh5co_most_trading" />
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font">
                                    <p class="card-title"> {{ substr($data->title, 0, 20) }}</p>
                                    <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $data->created_at->diffForHumans() }}</i>&nbsp;&nbsp;

                                </div>

                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection
