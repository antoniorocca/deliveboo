<header >
    <nav id="nav" class="navbar navbar-expand-md navbar-light">
        <div class="container">    
            <div id="logo" class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/deliveboo-logo-green.png')}}" alt="">
                </a>
                <search-component></search-component> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>   
            </div> 

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->

                <div id="collapse" class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest
                    <div id="btn_auth" class="d-flex">
                        <a class="nav-link mx-3 d-flex align-items-center justify-content-center" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        @if (Route::has('register'))
                        <a class="nav-link d-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        @endif
                    </div>
                   

                    @else
                    <!-- <a class="" href="{{route('user.home')}}">
                        Home
                    </a> -->
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <a class="dropdown-item" href="{{route('user.home')}}">
                                Profilo
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
    <div class="" style="height:100px">

    </div>   
    <header-component v-if="!this.$store.state.showRestaurant"></header-component>
</header>