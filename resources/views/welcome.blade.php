@extends('layouts.app_guest')

@section('guest_content')

<transition name='landing'>
  <landing-component style="border: 5px solid red" v-if="this.$store.state.showLanding"></landing-component>
</transition>


<!-- COMPONENTE CATEGORIES EDO -->
<!-- <div class="select_restaurant">
    <edo-categories v-if="true"></edo-categories>
    <edo-restaurants v-if="true"></edo-restaurants>
</div> -->
{{-- DA CENCELLARE? --}}



<div id="main_container_box"class="" style="border: 5px solid green" v-if="this.$store.state.showMain">
  <div class="main_container_row"style="border: 5px solid purple" v-if="this.$store.state.showSelectRestaurant">
    <div class="categories"  >
      <edo-categories></edo-categories>
    </div>
    <div class="restaurants">
      <restaurant-component></restaurant-component>
    </div>
  </div>





  <div class="main_container_row"style="border: 5px solid pink" v-if="this.$store.state.showRestaurant">
    <div class="restaurant_show" >
      <div class="">
        <selected-restaurant></selected-restaurant>
      </div>
    </div>
    <div style="display:flex; flex-direction:column;" v-if="this.$store.state.showCart">
      <cart-dropdown id="box_cart" class="cart-box"></cart-dropdown>
    </div>
  </div>





</div>


<!-- <div class="wrap" style="display:flex;">


    LANDING-COMPONENT
    <landing-component></landing-component>

</div> -->
@endsection
