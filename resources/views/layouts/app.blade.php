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
                        <div id="btn_auth" class="d-flex">
                            <a class="nav-link mx-2 d-flex align-items-center justify-content-center" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            @if (Route::has('register'))
                            <a class="nav-link d-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Registrati') }}</a>
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
            @yield('content')
        </main>

    </div>
    @yield('scripts')
</body>

</html>