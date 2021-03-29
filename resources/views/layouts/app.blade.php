@include('layouts.head')

<body>
    <div id="app">
        <nav id="back_nav" class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/deliveboo-logo-green.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                    <div id="collapse" class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        <div class="d-flex">
                            <a class="nav-link mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                        @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>

                </div>
            </div>
        </nav>
        <div class="spacer">
            <img class="img_spacer" src="{{asset('storage/yellow_arch.png')}}" alt="">
        </div>

        <main class="py-4">
            <nav id="user_nav" class="d-flex">

                <div class="button_wrap">
                    <a class="" href="{{route('user.home')}}">
                        <div class="user_nav_button">
                            <img src="{{asset('storage/house1.png')}}" alt="">
                        </div>
                    </a>
                    <span class="user_span">home</span>
                </div>


                <div class="button_wrap">
                    <a class="" href="{{route('user.restaurant.index') }}">
                        <div class="user_nav_button">
                            <img src="{{asset('storage/restaurant.png')}}" alt="">
                        </div>
                    </a>
                    <span class="user_span">Il mio ristorante</span>
                </div>



                <div class="button_wrap">
                    <a class="" href="{{route('user.dish.index')}}">
                        <div class="user_nav_button">
                            <img src="{{asset('storage/steak.png')}}" alt="">
                        </div>
                    </a>
                    <span class="user_span">piatti</span>
                </div>


                <div class="button_wrap">
                    <a class="" href="{{route('user.graphs')}}">
                        <div class="user_nav_button">
                            <img src="{{asset('storage/analysis.png')}}" alt="">
                        </div>
                    </a>
                    <span class="user_span">grafici</span>
                </div>

            </nav>
            @yield('content')
        </main>

    </div>
    @yield('scripts')
</body>

</html>