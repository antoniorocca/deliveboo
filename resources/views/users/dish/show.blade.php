@extends('layouts.app')
@section('content')
@include('layouts.registered_nav')

{{-- {{dd($dish)}} --}}
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>

<div id="backend_container" class="">
  <div class="backend_wrap">
    <a id="glovo_btn" href="{{ route('user.dish.index') }}">Dishes</a>
    <h1>Piatto: {{$dish->name}}</h1>


    <h4 class="text-info">img</h4>
    @if ($dish->img)
    <img src="{{asset('storage/' . $dish->img )}}" style="height:300px;" alt="">
    <img src="{{$dish->img}}" style="height:300px;" alt="">
    @else
    <p class="card-text text-danger">N/A</p>
    @endif
    <div class="content_row">
      <h4 class="text-info">Nome</h4>
      <p class="card-title text-danger">{{$dish->name}}</p>
    </div>
    <div class="content_row">
      <h4 class="text-info">descrizione</h4>
      <p class="card-text text-danger">
        @if ($dish->description)
        {{$dish->description}}
        @else
        N/A
        @endif
      </p>
    </div>
    <div class="content_row">
      <h4 class="text-info">prezzo</h4>
      <p class="card-text">{{$dish->price}}</p>
    </div>
    <div class="content_row">
      <h4 class="text-info">classe menu</h4>
      <p class="card-text">
        @if ($dish->menu_class)
        {{$dish->menu_class}}
        @else
        N/A
        @endif
      </p>
    </div>
    <div class="content_row">
      <h4 class="text-info">sconto</h4>
      <p class="card-text text-danger">
        @if ($dish->discount === 0)
        no
        @else
        -
        @endif
      </p>
    </div>




  </div>
</div>
@endsection