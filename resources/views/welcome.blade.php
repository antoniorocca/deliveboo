@extends('layouts.app_guest')

@section('guest_content')

    <!-- LANDING PAGE COMPONENT -->
    {{-- <landing-component v-if="showLanding"></landing-component> --}}


    <!-- COMPONENTE CATEGORIES EDO -->
    {{-- <div class="select_restaurant">
        <edo-categories v-if="showMain"></edo-categories>
        <edo-restaurants v-if="showMain"></edo-restaurants>
    </div> --}}

    <!-- COMPONENTE RISTORANTE -->
    <restaurant-component></restaurant-component>
    <selected-restaurant></selected-restaurant>


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
        </header>

            <cart-dropdown></cart-dropdown>
        </nav>

        <div class="section content">
            <h1>Our Products</h1>
            <products-list></products-list>
        </div>
    </div>


    <!-- CARRELLO -->


    <div class="section_content" style=" display:flex; flex-wrap:wrap">
      <h1 style="width:100%">Our Products</h1>
      <products-list style="width:70%"></products-list>
      <div class="" style="displa:flex; flex-direction:column;">
        <cart-dropdown class="cart-box"></cart-dropdown>
        <!-- <edo-payment></edo-payment> -->

      </div>
      <products-list2 style="width:70%"></products-list2>
    </div>

@endsection
