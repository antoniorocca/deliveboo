@extends('layouts.app')
@section('content')
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container">
<div class="container">
    <h1>modifica piatto: {{$dish->name}}</h1>
    <form action="{{ route('user.dish.update', ['dish' => $dish->slug]) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('patch')

        <div class="container">

            {{-- name --}}
            <div class="content_row">
                <label for="name" class="col-sm-1-12 col-form-label text-info">Nome piatto</label>
                <div class="col-md-12-12 col-md-12">
                    <input class="edit_input" type="text" class="form-control" name="name" value="{{$dish->name}} " maxlength="30">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- description --}}
            <div class="content_row">
                <label for="description" class="col-sm-1-12 col-form-label text-info">Descrizione</label>
                <div class="col-md-12-12 col-md-12">
                    <textarea class="edit_input" type="text" class="form-control" name="description" value="" maxlength="500">{{$dish->description}}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- img --}}
            <div class="form-group">
                @if ($dish->img)
                <dd>foto piatto</dd>
                <img src="{{asset('storage/' . $dish->img )}}" style="height:300px;" alt="">
                <img src="{{'/' . $dish->img}}" style="height:300px;" alt="">
                @else
                <p class="card-text text-danger">N/A</p>
                @endif
                <br>
                <br>
                <dd for="img">Carica/inserisci foto del piatto</dd>
                <input type="file" class="form-control-file" name="img" placeholder="" aria-describedby="fileHelpId">
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- price --}}
            <div class="content_row">
                <label for="price" class="col-sm-1-12 col-form-label text-info">Prezzo</label>
                <div class="col-md-12-12 col-md-12">
                    <input class="edit_input" type="text" class="form-control" name="price" value="{{$dish->price}}" min="0" max="999.99" step="0.01">
                </div>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- menu_class --}}
            <div class="content_row">
                <label for="menu_class" class="col-sm-1-12 col-form-label text-info">Menu class</label>
                <div class="col-md-12-12 col-md-12">
                    <input class="edit_input" type="text" class="form-control" name="menu_class" value="{{$dish->menu_class}}" maxlength="30">
                </div>
                @error('menu_class')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- discount --}}
            <div class="content_row">
                <label for="discount" class="col-lg-12 col-form-label text-info">Sconto</label>

                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="discount" value="1">
                    <label class="form-check-lable" for="discount">sconto</label>
                </div>
                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="discount" value="0">
                    <label class="form-check-lable" for="discount">nessuno sconto</label>
                </div>
                @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Update button --}}
            <div class="content_row">
                <div class="offset-sm-2 col-sm-10">
                    <input id="glovo_btn" type="submit" value="Update">
                </div>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection
