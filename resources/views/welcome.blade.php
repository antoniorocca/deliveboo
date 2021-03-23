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
<div class="wrap" style="display:flex;">
    <selected-restaurant></selected-restaurant>

    <!-- CARRELLO -->
    <div style="display:flex; flex-direction:column;">
        <cart-dropdown id="box_cart" class="cart-box"></cart-dropdown>

    </div>
</div>

@endsection