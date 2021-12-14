@extends('frontend.main_master')
@section('content')
    <style>
        .card-img-top {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

    </style>
    <div class="container ">
        <div class="jumbotron" style="background-color: rgb(255, 255, 255)">
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        @foreach ($news as $news)
                            <div class="card">
                                <div class="card-header" style="background-color: gray">
                                    <div class="card-title">
                                        {{ $news->title }}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-img">
                                        <a href=" {{ asset('upload/newsimage/' . $news->image) }}" target="_blank">
                                            <img class="card-img-top" height="450" width="645"
                                                src="{{ asset('upload/newsimage/' . $news->image) }}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-option px-4  my-2 animate-box">
                                        <hr>
                                        <span class="bg-gray"><b> Author Name :</b> {{ $news->author_name }}</span>
                                        <hr>
                                        <p class="card-text">{!! $news->news !!}</p>
                                        <br>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                        {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
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
                                        <div class="most_fh5co_treding_font_123">
                                            <i class="fa fa-clock-o mb-0" style="font-size:15px; color:#929496">
                                                {{ $news->created_at->diffForHumans() }}</i>&nbsp;&nbsp;
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







    {{-- @foreach ($latestnews as $data)
        <div class="row pb-">
            <div class="col-5 align-self-center">
                <a href="{{ route('show.news', $data->id) }}">
                    <img src="{{ asset('upload/newsimage/' . $data->image) }}" alt="img"
                        class="fh5co_most_trading" />
            </div>
            <div class="col-7 paddding">
                <div class="most_fh5co_treding_font">
                    <p class="card-title"> {{ substr($data->title, 0, 40) }}</p>
                </div>
                <div class="most_fh5co_treding_font_123">
                    <p class="card-title"> {{ $data->created_at }}</p>
                </div>
                </a>
            </div>

        </div>
    @endforeach --}}

@endsection
