@extends('layouts.app')
@section('content')
{{-- {{dd($dish)}} --}}
<div class="container">
    <h1>piatto: {{$dish->name}}</h1>
    <div class="card">
        <div class="card-body">
            <h4 class="text-info">img</h4>
            @if ($dish->img)
                <img src="{{asset('storage/' . $dish->img )}}" alt="">
                @else
                <p class="card-text text-danger">N/A</p>
            @endif
            <h4 class="text-info">Nome</h4>
            <p class="card-title text-danger">{{$dish->name}}</p>
            <h4 class="text-info">descrizione</h4>
            <p class="card-text text-danger">
                @if ($dish->description)
                {{$dish->description}}
                @else
                N/A
                @endif
            </p>
            <h4 class="text-info">prezzo</h4>
            <p class="card-text">{{$dish->price}}</p>
            <h4 class="text-info">classe menu</h4>
            <p class="card-text">
                @if ($dish->menu_class)
                {{$dish->menu_class}}
                @else
                N/A
                @endif
            </p>
          
            <h4 class="text-info">sconto</h4>
            <p class="card-text text-danger">
                @if ($dish->discount == 0)
                    no
                @else
                QUI STAMPARE SCONTO
                @endif
            </p>
        </div>
    </div>
</div>
@endsection