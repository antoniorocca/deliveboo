@extends('layouts.app_guest')

@section('guest_content')

    <!-- LANDING PAGE COMPONENT -->
    <landing-component v-if="showLanding"></landing-component>


    <!-- COMPONENTE CATEGORIES EDO -->
    <div class="select_restaurant">
        <edo-categories v-if="showMain"></edo-categories>
        <edo-restaurants v-if="showMain"></edo-restaurants>
    </div>

    <!-- COMPONENTE RISTORANTE -->
    <restaurant-component></restaurant-component>

    
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

