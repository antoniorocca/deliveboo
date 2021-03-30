@extends('layouts.app')
@section('content')
@include('layouts.registered_nav')

{{-- {{dd($dish)}} --}}
<div class="spacer">
    <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>

<div id="backend_container" class="">
    <div class="backend_wrap">
        <a id="glovo_btn" href="{{ route('user.dish.index') }}">Piatti</a>
        <h1>Piatto: {{$dish->name}}</h1>

        <h4 class="text-info">Img</h4>
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
            <h4 class="text-info">Descrizione</h4>
            <p class="card-text text-danger">
                @if ($dish->description)
                    {{$dish->description}}
                @else
                    N/A
                @endif
            </p>
        </div>
        <div class="content_row">
            <h4 class="text-info">Prezzo</h4>
            <p class="card-text">{{number_format($dish['price'], 2)}}</p>
        </div>
        <div class="content_row">
            <h4 class="text-info">Classe menu</h4>
            <p class="card-text">
                @if ($dish->menu_class)
                    {{$dish->menu_class}}
                @else
                    N/A
                @endif
            </p>
        </div>
        <div class="content_row">
            <h4 class="text-info">Sconto</h4>
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