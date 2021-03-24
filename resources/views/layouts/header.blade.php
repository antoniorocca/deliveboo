<header>
    <nav id="nav" class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-around align-items-center">
        <div id="logo" class="d-flex">
            <a href="/"><img src="{{asset('img/deliveboo-logo-green.png')}}" alt=""></a>
            <div>
                <input id="header_logo" type="text" placeholder="Cerca" v-model="search" @keyup.enter="switchMain"><i></i>
            </div>
        </div>

        <div id="register" class="d-flex align-items-center">
            <!--flex-center position-ref full-height-->
            @if (Route::has('login'))
            <!-- <div class="top-right links"> -->
            @auth
            <a class="" href="{{route('user.home')}}">
                Home
            </a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
            <!-- </div> -->
            @endif
        </div>
    </nav>

    <div id="link-consegne">
        <p>Consegne in <a href="">Via ...... <i class="fas fa-angle-down"></i></a></p>
    </div>
</header>