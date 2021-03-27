@extends('layouts.app_guest')

@section('guest_content')


<landing-component style="border: 5px solid red" ></landing-component>


<!-- COMPONENTE CATEGORIES EDO -->
<!-- <div class="select_restaurant">
    <edo-categories v-if="true"></edo-categories>
    <edo-restaurants v-if="true"></edo-restaurants>
</div> -->
{{-- DA CENCELLARE? --}}
<div id="main_container_box"class="" style="border: 5px solid green">
  <div class="main_container_row"style="border: 5px solid purple">
    <div class="categories" style="background: lightgreen" >
      <edo-categories></edo-categories>
    </div>
    <div class="restaurants"style="background: lightyellow">
      <restaurant-component></restaurant-component>
    </div>
  </div>
  <div class="main_container_row"style="border: 5px solid pink">
    <div class="restaurant_show" style="background: violet">
      <div class="">
        <selected-restaurant></selected-restaurant>
      </div>
    </div>
    <div style="display:flex; flex-direction:column;">
      <cart-dropdown id="box_cart" class="cart-box" v-if="true"></cart-dropdown>
    </div>
  </div>
</div>


<div class="wrap" style="display:flex;">

    <!-- SELECTED-RESTAURANT -->

    LANDING-COMPONENT
    <landing-component></landing-component>

    <!-- CARRELLO -->
</div>
@endsection
