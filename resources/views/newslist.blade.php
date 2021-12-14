{{-- @extends('frontend.main_master')
@section('content')
    <div class="container">
        <div class="jumbotron bg-light ">

            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News News</div>

            @foreach ($news as $news)
                <div class="row pb-4">
                    <div class="col-md-2 ">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                               <a href="{{ route('show.news', $news->id) }}">
                                <img src="{{ asset('upload/newsimage/' . $news->image) }}"
                                alt="" />
                               </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 animate-box">
                        <a href="{{ route('show.news', $news->id) }}"> {{ $news->title }}</a>
                        <br>
                        <span class="text-bold"> Author : {{ $news->author_name }}</span>
                        <br>
                        {{Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
                    </div>
                </div>
            @endforeach
        </div>
@endsection --}}



@extends('frontend.main_master')
@section('content')
    <style>
        .card-img-top {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

    </style>
    <div class="container ">
        <div class="jumbotron bg-light ">
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        @foreach ($news as $news)
                            <div class="row pb-4">
                                <div class="col-md-2 ">
                                    <div class="fh5co_hover_news_img">
                                        <div class="fh5co_news_img">
                                            <a href="{{ route('show.news', $news->id) }}">
                                                <img src="{{ asset('upload/newsimage/' . $news->image) }}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 animate-box">
                                    <a href="{{ route('show.news', $news->id) }}"> {{ $news->title }}</a>
                                    <br>
                                    <span class="text-bold"> Author : {{ $news->author_name }}</span>
                                    <br>

                                    <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</i>&nbsp;&nbsp;
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-4">
                        <h2>Latest News</h2>
                        <hr>
                        <div class="container">
                            @foreach ($latestnews as $data)
                                <div class="row my-2">
                                    <div class="col-5 align-self-center animate-box">
                                        <a href="{{ route('show.news', $data->id) }}">
                                            <img src="{{ asset('upload/newsimage/' . $data->image) }}" alt="img"
                                                class="fh5co_most_trading animate-box fadein rounded-lg" />
                                    </div>
                                    <div class="col-7 paddding">
                                        <div class="most_fh5co_treding_font">
                                            <p class="card-title"> {{ substr($data->title, 0, 20) }}</p>
                                        </div>
                                        <div class="most_fh5co_treding_font_123" style="font-size:15px; color:#929496">
                                            <i class="fa fa-clock-o mb-0" >
                                                {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</i>&nbsp;&nbsp;
                                        </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
