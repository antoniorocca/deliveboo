@extends('layouts.app')

@section('content')
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container"class="">
  <div class="backend_wrap">

    <div id="main_container" class="main_container_home">
      <h1 > <strong>{{Auth::user()->name}}</strong>  benvenuto nella tua dashboard</h1>
      <h2>You are logged in!</h2>
      <img src="{{asset('storage/pizza.png')}}" alt="">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

    </div>
  </div>
</div>
@endsection
