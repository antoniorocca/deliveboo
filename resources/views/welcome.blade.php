@extends('layouts.app_guest')

@section('guest_header')    
<!-- TRASFORMARE HEADER IN COMPONENTE -->
<header>
    <nav id="nav" class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-around align-items-center">
        <div id="logo" class="d-flex">
            <a href=""><img src="{{asset('img/logo_green.svg')}}" alt=""></a>
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

<a href="/guests/restaurant">ristorate vista </a>
@endsection

@section('guest_content')

    <!-- LANDING PAGE COMPONENT -->
    <landing-component v-if="showLanding"></landing-component>


    <!-- COMPONENTE CATEGORIES EDO -->
    <div class="select_restaurant">
        <edo-categories v-if="showMain"></edo-categories>
        <edo-restaurants v-if="showMain"></edo-restaurants>
    </div>

    <!-- COMPONENTE RISTORANTE -->
    <restaurant-component v-if="showMain"></restaurant-component>

    
    <!-- CARRELLO -->
    <div class="cart-box" v-if="showMain">
        <nav class="navbar is-primary">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    Voerro Shopping Cart Tutorial
                </a>

                <div class="navbar-burger burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <cart-dropdown></cart-dropdown>
        </nav>

        <div class="section content">
            <h1>Our Products</h1>
            <products-list></products-list>
        </div>
    </div>

@endsection

