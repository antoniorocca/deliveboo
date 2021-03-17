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
    <body class="container">
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
        



        <!-- VUE APP -->
        <!-- ////////////////////////////////// -->
        <div id="app">
            <restaurant-component></restaurant-component>

            {{-- <p>
                <router-link to="/foo">Go to Foo</router-link>
                <router-link to="/generali">Mostra robbe</router-link>
            </p> --}}
 
            {{-- <router-view></router-view> --}}
            {{-- <show-all></show-all> --}}

        </div>
    </body>
</html>
