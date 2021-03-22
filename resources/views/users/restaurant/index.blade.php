@extends('layouts.app')

@section('content')
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>

<div id="backend_container"class="">
  <div class="backend_wrap">


    <h1>Il mio ristorante</h1>
    <a class="btn btn-primary" href="{{ route('user.restaurant.edit', $restaurant) }}">Modifica il ristorante</a>

    <div class="content_row">
      <h1>{{$restaurant['name']}}</h1>
    </div>

    <div class="content_row">
      <p>{{$restaurant['description']}}</p>
    </div>

    <h4>Telefono:</h4>
    <div class="content_row">
      <p>{{$restaurant['phone_number']}}</p>
    </div>

    <h4>Immagine:</h4>
    <!-- per farla veloce -->
    <img src="{{ asset('storage/' . $restaurant->img )}}" alt="">
    <img src="{{$restaurant->img}}" alt="">

    <h4>Indirizzo:</h4>
    <div class="content_row">
      <p>{{$user['address']}}</p>
    </div>

    <h4>Apertura:</h4>
    <div class="content_row">
      <p>{{$restaurant['opening_time']}}</p>
    </div>

    <h4>Chiusura:</h4>
    <div class="content_row">
      <p>{{$restaurant['closure_time']}}</p>
    </div>

    <h4>spedizione gratutita:</h4>
    <div class="content_row">
      <p class="card-text text-danger">
        @if ($restaurant->free_shipping === 1)
        consegna gratuita
        @else
        consegna a pagamento
        @endif
      </p>
    </div>

    <h4>Prezzo spedizione:</h4>
    <div class="content_row">
      <p>{{$restaurant['price_shipping']}}</p>
    </div>

  </div>
</div>

@endsection
