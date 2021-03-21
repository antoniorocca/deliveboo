<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Deliveboo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Vue -->

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
    </head>

    <body>

        <!-- ////////////////////////////////////////////////////////////// -->
        <!-- UNIFICARE APP E APP2 IN UN UNICA APP (SINGLE PAGE APLICATION) -->
        <!-- ///////////////////////////////////////////////////////////////// -->

        <!-- VUE APP CARRELLO -->
        <!-- ////////////////////////////////// -->
        <div id="app2">

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
                        <a href="{{ url('/user/home') }}">Home</a>
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
            <!-- ///////////////////////////////////////////////// -->

            <!-- LANDING PAGE COMPONENT -->
            <landing-component v-if="showLanding"></landing-component>


            <!-- COMPONENTE CATEGORIES EDO -->
            <div class="select_restaurant">
                <edo-categories v-if="showMain"></edo-categories>
                <edo-restaurants></edo-restaurants>
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

            <footer-component></footer-component>
        </div>
    </body>
</html>