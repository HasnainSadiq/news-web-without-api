 <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
     <div class="container padding_786">
         <nav class="navbar navbar-toggleable-md navbar-light ">
             <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                 data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
             <a class="navbar-brand" href="#"><img src="" alt="img" class="mobile_logo_width fh5co_logo_width" /></a>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                         <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                     </li>
                     @php
                         $categories=App\Models\Category::all();
                     @endphp
                     @foreach ($categories as $category)
                         <li class="nav-item">
                             <a class="nav-link"
                                 href="{{ route('newslist.view', $category->id) }}">{{ $category->title }} <span
                                     class="sr-only">(current)</span></a>
                         </li>
                     @endforeach

                     @guest
                     @else
                         <li class="nav-item dropdown">
                             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ Auth::user()->name }}
                             </a>
                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                     class="d-none">
                                     @csrf
                                 </form>
                             </div>
                         </li>
                     @endguest
             </div>
         </nav>
     </div>
 </div>
