@extends('layouts.app')
@section('content')
<div class="container">
    <h1>modifica ristorante</h1>
    <form action="{{ route('user.restaurant.update', $restaurant) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="container">

            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nome ristorante</label>
                <div class="col-md-6">
                    <input id="name" maxlength='255' type="text" class="form-control" name="name" value="{{ $restaurant->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            {{-- description --}}
            <div class="form-group row">
                <label for="description" class="col-sm-1-12 col-form-label text-info">Descrizione</label>
                <div class="col-md-12-12 col-md-12">
                    <textarea type="text" class="form-control" name="description" value="{{$restaurant->description}}" maxlength="500">{{$restaurant->description}}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            
            {{-- categories --}}
            <div class="form-group">
             <label for="category_id">Categorie:</label>
             <select name="category_id[]"class="form-control" id="category_id" multiple>
               @foreach($categories as $category)
               <option value="{{$category->id}}" {{$restaurant->categories->contains($category) ? 'selected' : ''}}>{{$category->name}}</option>
               @endforeach
             </select>
            </div>



            {{-- phone_number --}}
            <div class="form-group row">
                <label for="phone_number" class="col-sm-1-12 col-form-label text-info">Numero di telefono</label>
                <div class="col-md-12-12 col-md-12">
                  <input type="text" class="form-control" name="phone_number" value="{{$restaurant->phone_number}}" maxlength="20">
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
                <img src="{{$restaurant->img}}" style="height:300px;" alt="">
                @else
                <p class="card-text text-danger">N/A</p>
                @endif
                <br>
                <br>
                <dd for="img">Carica/inserisci foto del ristorante</dd>
                <input type="file" class="form-control-file" name="img" placeholder="" aria-describedby="fileHelpId" maxlength="254">
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- location --}}
            <div class="form-group row">
                <label for="location" class="col-sm-1-12 col-form-label text-info">Location</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="form-control" name="location" value="{{$restaurant->location}}" maxlength="30">
                </div>
                @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- opening_time --}}
            <div class="form-group row">
                <label for="opening_time" class="col-sm-1-12 col-form-label text-info">Orario di apertura</label>
                <input type="text" class="form-control" name="opening_time" value="{{$restaurant->opening_time}}" maxlength="20">
                @error('opening_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- closure_time --}}
            <div class="form-group row">
                <label for="closure_time" class="col-lg-12 col-form-label text-info">Orario di chiusura</label>
                <input type="text" class="form-control" name="closure_time" value="{{$restaurant->closure_time}}" maxlength="20">
                @error('closure_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- free_shipping --}}
            <div class="form-group row">
                <label for="free_shipping" class="col-lg-12 col-form-label text-info">Consegna gratuita</label>

                <div class="col-md-1">
                    <input type="radio" class="form-check-input" name="free_shipping" value="1">
                    <label class="form-check-lable" for="free_shipping">consegna gratuita</label>
                </div>
                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="free_shipping" value="0">
                    <label class="form-check-lable" for="free_shipping">consegna a pagamento</label>
                </div>
                @error('free_shipping')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- price_shipping --}}
            <div class="form-group row">
                <label for="price_shipping" class="col-sm-1-12 col-form-label text-info">prezzo di consegna</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="form-control" name="price_shipping" value="{{$restaurant->price_shipping}}" min="0" max="99.99" step="0.01">
                </div>
                @error('price_shipping')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Update button --}}
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Update">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
