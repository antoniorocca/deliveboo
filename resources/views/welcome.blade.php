<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveboo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Vue -->

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            header{
                height: 800px;
            }
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            } */
        </style>
    </head>
    <body>
        <header>
            <nav class="d-flex justify-content-between">
                <div class="">
                    <a href=""><img src="{{asset('img/logo_green.svg')}}" alt=""></a>
                    <input type="text" placeholder="Cerca">
                </div>
                <div class="  ">
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
        </header>
        
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <!-- <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>   -->
        </div>
        
        <!-- VUE APP -->
        <!-- ////////////////////////////////// -->
        
        <div id="app">
            {{-- <rocco-matt></rocco-matt> --}}

            <h1>Hello App!</h1>
            <p>
                <!-- use router-link component for navigation. -->
                <!-- specify the link by passing the `to` prop. -->
                <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
                {{-- <router-link to="/foo">Go to Foo</router-link> --}}
                {{-- <router-link to="/generali">Mostra robbe</router-link> --}}
            </p>
            <!-- route outlet -->
            <!-- component matched by the route will render here -->
            {{-- <router-view></router-view> --}}


            {{-- <show-all></show-all> --}}

        </div>

        <footer>
            <a href="">
                <img id="footer_logo" src="{{asset('img/logo_white.svg')}}" alt="">
            </a>
            
            <div class="footer_container"> 

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">

                    <div class="col">
                        <h3>Uniamo le forze</h3>
                        <ul>
                            <li><a href="">Lavora con noi</a></li>
                            <li><a href="">Negozi partner</a></li>
                            <li><a href="">Corrieri</a></li>
                            <li><a href="">Business</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h3>Link di interesse</h3>
                        <ul>
                            <li><a href="">Chi siamo</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contattaci</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h3>Seguici</h3>
                        <ul>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Instagram</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <ul class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                            <ul class="row row-cols-2 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                                <li><a href=""><img src="{{asset('img/download-button-android.svg')}}" alt=""></a></li>
                                <li><a href=""><img src="{{asset('img/download-button-ios.svg')}}" alt=""></a></li>
                            </ul>
                            <ul class="row row-cols-3 row-cols-sm-1 row-cols-md-1 row-cols-lg-1">
                                <li><a href="">TERMINI E CONDIZIONI</a></li>
                                <li><a href="">POLITICA SULLA PRIVACY</a></li>
                                <li><a href="">POLITICA SUI COOKIE</a></li>
                            </ul>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
    </body>
</html>