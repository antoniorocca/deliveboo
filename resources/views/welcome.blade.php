@extends('layouts.app_guest')

@section('guest_content')

{{-- DA CENCELLARE? --}}
<!-- LANDING PAGE COMPONENT -->
{{-- <landing-component v-if="showLanding"></landing-component> --}}


<!-- COMPONENTE CATEGORIES EDO -->
{{-- <div class="select_restaurant">
    <edo-categories v-if="showMain"></edo-categories>
    <edo-restaurants v-if="showMain"></edo-restaurants>
</div> --}}
{{-- DA CENCELLARE? --}}


<!-- COMPONENTE RISTORANTE -->
<restaurant-component></restaurant-component>
<div class="wrap" style="display:flex;">
    <selected-restaurant></selected-restaurant>

    <!-- CALL-TO-ACTION -->
    <div class="call_to_action">
        <div class="title">
            <h2>Diventa uno di noi!</h2>
        </div>
        <div class="container_calls container">
            <div class="single_call">
                <div class="box_img">
                    <img src="{{ asset("img/photo_rider.png") }}" alt="" srcset="">
                </div>
                <h4>Diventa un rider</h4>
                <p>Lavora per te stesso! Goditi flessibilità, libertà e guadagni competitivi effettuando consegne con Deliveboo.</p>
                <a href="#" class="button">Unisciti a noi</a>
            </div>
            <div class="single_call">
                <div class="box_img">
                    <img src="{{ asset("img/photo_cooking.png") }}" alt="" srcset="">
                </div>
                <h4>Diventa un partner</h4>
                <p>Cresci con Deliveboo! La nostra tecnologia e la nostra base di utenti possono aiutarti a incrementare le vendite e aprire nuove opportunità!</p>
                <a href="#" class="button">Unisciti a noi</a>
            </div>
            <div class="single_call">
                <img src="{{ asset("img/photo_workwithus.png") }}" alt="" srcset="">
                <h4>Lavora con noi</h4>
                <p>Pronto per una nuova ed entusiasmante sfida? Se sei ambizioso, umile e ami lavorare con gli altri, mettiti in contatto con noi!</p>
                <a href="#" class="button">Unisciti a noi</a>
            </div>
            
        </div>
    


    </div>

    <!-- CARRELLO -->
    <div style="display:flex; flex-direction:column;">
        <cart-dropdown id="box_cart" class="cart-box"></cart-dropdown>
    </div>
</div>
@endsection