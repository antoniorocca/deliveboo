<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav id="back_nav" class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/logo_green.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="collapse" class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="spacer">
          <img class="img_spacer" src="{{asset('storage/yellow_arch.png')}}" alt="">
        </div>
        <main class="py-4">
          <nav id="user_nav" class="d-flex">

            <div class="button_wrap">
              <div class="user_nav_button">
                <a class="" href="{{route('user.home')}}">
                  <img src="{{asset('storage/house1.png')}}" alt="">
                </a>
              </div>
              <span class="user_span">home</span>
            </div>


            <div class="button_wrap">
              <div class="user_nav_button">
                <a class="" href="{{route('user.restaurant.index') }}">
                  <img src="{{asset('storage/restaurant.png')}}" alt="">
                </a>
              </div>
              <span class="user_span">Il mio ristorante</span>
            </div>



            <div class="button_wrap">
              <div class="user_nav_button">
                <a class="" href="{{route('user.dish.index')}}">
                  <img src="{{asset('storage/steak.png')}}" alt="">
                </a>
              </div>
              <span class="user_span">piatti</span>
            </div>


            <div class="button_wrap">
              <div class="user_nav_button">
                <a class="" href="{{route('user.graphs')}}">
                  <img src="{{asset('storage/analysis.png')}}" alt="">
                </a>
              </div>
              <span class="user_span">grafici</span>
            </div>


            <!-- <div class="user_nav_button">
              <a class="" href="{{route('user.restaurant.index') }}">Il mio ristorante</a>
            </div> -->
            <!-- <div class="user_nav_button">
              <a class="" href="{{route('user.dish.index')}}">Piatti</a>
            </div> -->
            <!-- <div class="user_nav_button">
              <a class="" href="{{route('user.graphs')}}">Grafici</a>
            </div> -->
            <!-- <div class="user_nav_button">
              <a class="" href="{{route('user.profile')}}">Profilo</a>
            </div> -->
          </nav>
          @yield('content')
        </main>
    </div>
</body>
</html>
