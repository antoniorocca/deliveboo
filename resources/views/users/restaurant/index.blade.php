@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Il mio ristorante</h1>

  <a class="btn btn-primary" href="{{ route('user.restaurant.edit', $restaurant) }}">Modifica il ristorante</a>
  <h1>{{$restaurant['name']}}</h1>
  <p>{{$restaurant['description']}}</p>
  <h4>Telefono:</h4>
  <p>{{$restaurant['phone_number']}}</p>


  <h4>Immagine:</h4>

  <!-- per farla veloce -->
  <img src="{{ asset('storage/' . $restaurant->img )}}" alt="">
  <img src="{{$restaurant->img}}" alt="">






  <h4>Indirizzo:</h4>
  <p>{{$user['address']}}</p>
  <h4>Apertura:</h4>
  <p>{{$restaurant['opening_time']}}</p>
  <h4>Chiusura:</h4>
  <p>{{$restaurant['closure_time']}}</p>
  <h4>spedizione gratutita:</h4>
  <p class="card-text text-danger">
    @if ($restaurant->free_shipping === 1)
    consegna gratuita
    @else
    consegna a pagamento
    @endif
 </p>
  <h4>Prezzo spedizione:</h4>
  <p>{{$restaurant['price_shipping']}}</p>
</div>

@endsection
