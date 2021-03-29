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