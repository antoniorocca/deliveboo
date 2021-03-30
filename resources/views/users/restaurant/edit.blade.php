@extends('layouts.app')
@section('content')
@include('layouts.registered_nav')

<div class="spacer">
    <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>

<div id="backend_container">

    <div class="container">
        <h1>Modifica ristorante</h1>
        <form action="{{ route('user.restaurant.update', $restaurant) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- name -->
            <div class="content_row">
                <label for="name" class="col-sm-1-12 col-form-label text-info">Nome ristorante</label>
                <div class="col-md-12-12 col-md-12">
                    <input id="name" maxlength='255' type="text" class="edit_input" name="name" value="{{ $restaurant->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            {{-- description --}}
            <div class="content_row">
                <label for="description" class="col-sm-1-12 col-form-label text-info">Descrizione</label>
                <div class="col-md-12-12 col-md-12">
                    <textarea type="text" class="edit_input" name="description" value="{{$restaurant->description}}" maxlength="500">{{$restaurant->description}}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- categories --}}
            <div class="form-group">
                <label for="category_id" class="col-sm-1-12 col-form-label text-info">Categorie:</label>
                <select name="category_id[]" class="edit_input" id="category_id" multiple>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$restaurant->categories->contains($category) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- categories --}}
            <div class="form-group">
                <label for="tag_id" class="col-sm-1-12 col-form-label text-info">Sconto ristorante:</label>
                <select name="tag_id[]" class="edit_input" id="tag_id" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{$restaurant->tags->contains($tag) ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>



            {{-- phone_number --}}
            <div class="content_row">
                <label for="phone_number" class="col-sm-1-12 col-form-label text-info">Numero di telefono</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="edit_input" name="phone_number" value="{{$restaurant->phone_number}}" maxlength="20">
                </div>
                @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- img --}}
            <div class="form-group">
                @if ($restaurant->img)
                <dd>foto ristorante</dd>
                <img src="{{asset('storage/' . $restaurant->img )}}" style="height:300px;" alt="">
                <img src="{{'/' . $restaurant->img}}" style="height:300px;" alt="">
                @else
                <p class="card-text text-danger">N/A</p>
                @endif
                <br>
                <br>
                <dd for="img">Carica/inserisci foto del ristorante</dd>
                <input type="file" class="edit_input-file" name="img" placeholder="" aria-describedby="fileHelpId" maxlength="254">
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- location --}}
            <div class="content_row">
                <label for="location" class="col-sm-1-12 col-form-label text-info">Location</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="edit_input" name="location" value="{{$restaurant->location}}" maxlength="30">
                </div>
                @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- opening_time --}}
            <div class="content_row">
                <label for="opening_time" class="col-sm-1-12 col-form-label text-info">Orario di apertura</label>
                <input type="text" class="edit_input" name="opening_time" value="{{$restaurant->opening_time}}" maxlength="20">
                @error('opening_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- closure_time --}}
            <div class="content_row">
                <label for="closure_time" class="col-lg-12 col-form-label text-info">Orario di chiusura</label>
                <input type="text" class="edit_input" name="closure_time" value="{{$restaurant->closure_time}}" maxlength="20">
                @error('closure_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- free_shipping --}}
            <div class="content_row">
                <label for="free_shipping" class="col-lg-12 col-form-label text-info">Consegna gratuita</label>

                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="free_shipping" value="1">
                    <label class="" for="free_shipping">consegna gratuita</label>
                </div>
                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="free_shipping" value="0">
                    <label class="" for="free_shipping">consegna a pagamento</label>
                </div>
                @error('free_shipping')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- price_shipping --}}
            <div class="content_row">
                <label for="price_shipping" class="col-sm-1-12 col-form-label text-info">prezzo di consegna</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="edit_input" name="price_shipping" value="{{$restaurant->price_shipping}}" min="0" max="99.99" step="0.01">
                </div>
                @error('price_shipping')
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
@endsection