@extends('layouts.app')
@section('content')
@include('layouts.registered_nav')

<div class="spacer">
    <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container">
    <div class="backend_wrap">
        <h1>Crea piatto</h1>

        <form action="{{ route('user.dish.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="container">
                <div>* Campo obligatorio</div>

                {{-- name --}}
                <label for="name" class="col-sm-1-12 col-form-label text-info">Nome</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="text" class="edit_input" name="name" value="" maxlength='30'>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- description --}}
                <label for="description" class="col-sm-1-12 col-form-label text-info">Descrizione</label>
                <div class="col-md-12-12 col-md-12">
                    <textarea type="text" class="edit_input" name="description" value="" maxlength='500'></textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- img --}}
                <label for="img">Immagine piatto</label>
                <input type="file" class="edit_input-file" name="img" aria-describedby="fileHelpId">
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <br>

                {{-- price --}}
                <label for="price" class="col-sm-1-12 col-form-label text-info">Prezzo*</label>
                <div class="col-md-12-12 col-md-12">
                    <input type="number" class="edit_input" name="price" value="" min="0" max="999.99" step="0.01">
                </div>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- menu_class --}}
                <label for="menu_class" class="col-sm-1-12 col-form-label text-info">Classe menu</label>
                <div class="col-md-12-12 col-md-12">
                    <textarea type="text" class="edit_input" name="menu_class" value="" maxlength='30'></textarea>
                </div>
                @error('menu_class')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- discount --}}
                <label for="discount" class="col-lg-12 col-form-label text-info">Sconto</label>

                <div class="col-md-1">
                    <input type="radio" class="form-check-input" name="discount" value="1">
                    <label class="form-check-lable" for="discount">No</label>
                </div>
                <div class="col-md-2">
                    <input type="radio" class="form-check-input" name="discount" value="0">
                    <label class="form-check-lable" for="discount">Sconto</label>
                </div>

                @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror




                {{-- Create button --}}
                <div class="offset-sm-2 col-sm-10">
                    <input id="glovo_btn" type="submit" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection