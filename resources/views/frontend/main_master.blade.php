<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SCIFI | News</title>
    <link href="{{ asset('frontend/css/media_query.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/style_1.css') }}" rel="stylesheet" type="text/css" />

    <style>
        body  {
          background-image: url('{{asset('images/background.png')}}')
        }
        </style>
    <!-- Modernizr JS -->
    <script src="{{ asset('frontend/js/modernizr-3.5.0.min.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</head>

<body >
    <div class="container-fluid fh5co_header_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right py-2">


                    {{-- @auth
                        @if (Auth::user()->is_admin)
                        <a href="{{ route('users.management')}}" class="btn btn-link-light">User Management</a>
                        <a href="{{ route('category.create') }}" class="btn btn-link-light">Add Category</a>
                        @endif
                    @endauth --}}


                    @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('user.management')}}" class="btn btn-link-light">User Management</a>
                        <a href="{{ route('category.create') }}" class="btn btn-link-light">Add Category</a>
                        <a href="{{ route('admin-news.create') }}" class="btn btn-link-light">Add News</a>
                        @else
                        <a href="{{ route('news.create') }}" class="btn btn-link-light">Add News</a>

                    @endif
                   @endauth

                   @guest
                   <a href="{{ route('guest-news.create') }}" class="btn btn-link-light">Add News</a>
                   @endguest






                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('admin.news') }}" class="btn btn-link-light">Manage News</a>
                        @else
                            <a href="{{ route('news.index') }}" class="btn btn-link-light">My News</a>
                        @endif
                    @endauth


                    @guest
                        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                    @else
                        <a href="#" class="btn btn-link-light">{{ Auth::user()->name }}</a>
                        <a class="btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @endguest
                    {{-- <a href="{{route('login')}}" class="btn btn-link-light">Login</a> --}}
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 fh5co_padding_menu">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="img" class="fh5co_logo_width" />
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div> --}}
    @include('frontend.body.header')









    <div class=" container" style="background:#fff !important;">
    @yield('content')
</div>


    @include('frontend.body.footer')
    <div class="container-fluid fh5co_footer_right_reserved">

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>


    <script>
        CKEDITOR.replace( 'description' );
    </script>



</body>

</html>
