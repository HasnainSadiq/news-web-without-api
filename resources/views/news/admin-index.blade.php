@extends('frontend.main_master')
@section('title', 'view')
@section('content')
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach ($data as $data)
                    <div class="item">
                        <a href="{{ route('show.news', $data->id) }}">
                            <div class="card fh5co_latest_trading_img_position_relative"
                                style="width: 15rem; height: 200px;">
                                <div class="ribbon ribbon-top-left"><span
                                    class="{{ $data->status == 'active' ? 'bg-success' : 'bg-danger' }}">{{ ucfirst($data->status) }}</span>
                            </div>
                                <div class="card-body ">
                                    <div class="news-card">
                                        <img class="card-img-top   fh5co_latest_trading_img"
                                            src="{{ asset('upload/newsimage/' . $data->image) }}" alt="Card image cap"
                                            style="height:143px !important;">
                                        <div class="overlay">
                                            <a href="{{ route('admin.news.edit', $data->id) }}"
                                                class="btn btn-warning btn-sm mr-2"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('admin.news.delete', $data->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <p class="pt-2 px-2 mb-0">{{ substr($data->title, 0, 25) }}</p>
                                    @php
                                        $cat = App\Models\Category::find($data->category_id);
                                    @endphp

                                    <p class="px-2 text-muted" style="font-size: 11px;">{{ $cat->title }}</p>


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
@section('title', 'view')
@section('content')
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            @foreach ($data as $data)
                <div class="item px-2">
                    <a href="{{ route('show.news', $data->id) }}">
                        <div class="card fh5co_latest_trading_img_position_relative" style="width: 15rem; height: 200px;">
                            <img class="card-img-top fh5co_latest_trading_img"
                                src="{{ asset('upload/newsimage/' . $data->image) }}"
                                alt="Card image cap">
                            <div class="card-footer">
                                <p class="card-title">Title: {{ substr($data->title, 0, 40) }}</p>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection --}}







{{--
@extends('frontend.main_master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h2>ALL News</h2>
                        <table class="table table-dark">
                            <thead class=" navbar-dark bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>author_name</th>
                                    <th>title</th>
                                    <th>news</th>
                                    <th>image</th>
                                    <th>category</th>
                                    <th>user_id</th>
                                    <th>status</th>
                                    <th colspan="3"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $dt->author_name }}</td>
                                        <td>{{ substr($dt->title, 0, 20) }}</td>
                                        <td>{{ substr($dt->news, 0, 30) }}</td>
                                        <td><img src="{{ asset('upload/newsimage/' . $dt->image) }}" width="75" alt="">
                                        </td>
                                        @php
                                            $cat = App\Models\Category::find($dt->category_id);
                                        @endphp
                                        <td>{{ $cat->title }}</td>
                                        <td>{{ $dt->user_id }}</td>
                                        <td>{{ $dt->status }}</td>
                                        <td> <button type="button" class="fa fa-eye" data-toggle="modal"
                                                data-target="#ShowNews{{ $dt->id }}">

                                            </button>
                                        </td>
                                        <td><a href="{{ route('admin.news.edit', $dt->id) }}"
                                                class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></td>
                                        <td><a href="{{ route('admin.news.delete', $dt->id) }}"
                                                class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></td>

                                    </tr>

                                    <div class="modal fade" id="ShowNews{{ $dt->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">News Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $dt->news }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection --}}
