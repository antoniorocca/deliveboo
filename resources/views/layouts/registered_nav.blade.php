<nav id="user_nav" >

    <div class="button_wrap">
        <a class="" href="{{route('user.home')}}">
            <div class="user_nav_button">
                <img src="/img/house1.png" alt="">
            </div>
        </a>
        <span class="user_span">home</span>
    </div>


    <div class="button_wrap">
        <a class="" href="{{route('user.restaurant.index') }}">
            <div class="user_nav_button">
                <img src="/img/restaurant.png" alt="">
            </div>
        </a>
        <span class="user_span">ristorante</span>
    </div>



    <div class="button_wrap">
        <a class="" href="{{route('user.dish.index')}}">
            <div class="user_nav_button">
                <img src="/img/steak.png" alt="">
            </div>
        </a>
        <span class="user_span">piatti</span>
    </div>


    <div class="button_wrap">
        <a class="" href="{{route('user.graphs')}}">
            <div class="user_nav_button">
                <img src="/img/analysis.png" alt="">
            </div>
        </a>
        <span class="user_span">grafici</span>
    </div>

</nav>
