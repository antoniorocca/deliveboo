@extends('layouts.app')

@section('content') 
<a class="btn btn-primary" href="{{ route('user.restaurant.edit', $restaurant) }}">Modifica il ristorante</a>
   <p>{{$restaurant['description']}}</p>
   <p>{{$restaurant['phone_number']}}</p>
   <img src="{{ asset('storage/' . $restaurant->img )}}" alt="">
   <p>{{$restaurant['location']}}</p>
   <p>{{$restaurant['opening_time']}}</p>
   <p>{{$restaurant['closure_time']}}</p>
   <p>{{$restaurant['free_shipping']}}</p>
   <p>{{$restaurant['price_shipping']}}</p>   
@endsection