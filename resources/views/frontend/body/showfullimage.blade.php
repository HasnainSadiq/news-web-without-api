@extends('frontend.main_master')
@section('content')
{{-- <style>
.card-img-top{
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
}
</style> --}}
    <div class="container">
        <div class="jumbotron bg-light ">
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            @foreach ($news as $news)
            <img src="{{ asset('upload/newsimage/' . $news->image) }}" class="img-fluid" alt="Responsive image">
            @endforeach
        </div>
    </div>
@endsection




{{-- @foreach ($news as $news)
<div class="card rounded-lg" style="width: 100%;">
    <div class="fh5co_news_img">
            <img class="card-img-top" height="450" src="{{ asset('upload/newsimage/' . $news->image) }}" alt="Card image cap">
     </div> --}}

    {{-- <a href="{{ route('show.image', $news->id) }}">
    <img class="card-img-top" height="450" src="{{ asset('upload/newsimage/' . $news->image) }}" alt="Card image cap">
    </a> --}}
  {{-- </div> --}}
