@extends('layouts.app')

@section('content')
@include('layouts.registered_nav')

<div class="spacer">
    <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>

<div id="backend_container" class="">
    <div class="backend_wrap">


        <h1>Il mio ristorante</h1>
        <a id="glovo_btn" href="{{ route('user.restaurant.edit', $restaurant) }}">Modifica il ristorante</a>

        <h4 style="font-size: 40px; margin: 20px 0; color: #00a082;">Nome ristorante: <span style="color:black;">{{$restaurant['name']}}</span></h4>

        <h4 style="font-size: 30px; margin: 20px 0; color: #00a082;">Descrizione: <span style="color:black;">{{$restaurant['description']}}</span></h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Telefono: <span style="color:black;">{{$restaurant['phone_number']}}</span></h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Immagine:</h4>
        <!-- per farla veloce -->
        <img src=" {{ asset('storage/' . $restaurant->img )}}" alt="">
        <img src="{{'/' . $restaurant->img}}" alt="">

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Indirizzo: <span style="color:black;">{{$restaurant['address']}}</span></h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Apertura: <span style="color:black;">{{$restaurant['opening_time']}}</span></h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Chiusura: <span style="color:black;">{{$restaurant['closure_time']}}</span></h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Spedizione gratuita:
            <span style="color:black;">
                @if ($restaurant->free_shipping === 1)
                consegna gratuita
                @else
                consegna a pagamento
                @endif
            </span>
        </h4>

        <h4 style="font-size: 20px; margin: 20px 0; color: #00a082;">Prezzo spedizione: <span style="color:black;">{{$restaurant['price_shipping']}}</span></h4>

    </div>
</div>

@endsection