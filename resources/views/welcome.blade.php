@extends('layouts.app_guest')

@section('guest_content')

{{-- DA CENCELLARE? --}}
<!-- LANDING PAGE COMPONENT -->
<!-- v-if="showLanding" -->
{{-- <landing-component ></landing-component> --}}


<!-- COMPONENTE CATEGORIES EDO -->
<!-- <div class="select_restaurant">
    <edo-categories v-if="true"></edo-categories>
    <edo-restaurants v-if="true"></edo-restaurants>
</div> -->
{{-- DA CENCELLARE? --}}
<div id="main_container_box"class="">
  <edo-categories></edo-categories>
  <restaurant-component></restaurant-component>
</div>


<!-- COMPONENTE RISTORANTE -->
<!-- <carousel-component></carousel-component>
<restaurant-component></restaurant-component> -->


<div class="wrap" style="display:flex;">

    <!-- SELECTED-RESTAURANT -->
    <selected-restaurant></selected-restaurant>

    <!-- LANDING-COMPONENT -->
    <landing-component></landing-component>

    <!-- CARRELLO -->
    <div style="display:flex; flex-direction:column;">
        <cart-dropdown id="box_cart" class="cart-box"></cart-dropdown>
    </div>
</div>
@endsection