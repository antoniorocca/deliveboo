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
<div id="new_main_box" style="border: 5px solid green; display:flex;" v-if="this.$store.state.showMain">

  <edo-categories style="border: 5px solid purple; max-width:20%" v-if="this.$store.state.showSelectRestaurant"></edo-categories>
  <restaurant-component style="border: 5px solid violet" v-if="this.$store.state.showSelectRestaurant"></restaurant-component>
  <selected-restaurant style="border: 5px solid lightgreen" v-if="this.$store.state.showRestaurant"></selected-restaurant>
  <cart-dropdown id="box_cart" class="cart-box" style="border: 5px solid lightyellow" v-if="this.$store.state.cart[0]"></cart-dropdown>
</div>


<!-- <transition name="main_box">
  <div id="main_container_box"class="" style="border: 5px solid green; display:flex;" v-if="this.$store.state.showMain">








    <transition name="category_group">
      <div class="main_container_row"style="border: 5px solid purple" v-if="this.$store.state.showSelectRestaurant">
        <div class="categories"  >
          <edo-categories></edo-categories>
        </div>
        <div class="restaurants">
          <restaurant-component></restaurant-component>
        </div>
      </div>
    </transition>




    <transition name="show_restaurant">
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
    </transition>





  </div>
</transition> -->


<!-- <div class="wrap" style="display:flex;">


    LANDING-COMPONENT
    <landing-component></landing-component>

</div> -->
@endsection
