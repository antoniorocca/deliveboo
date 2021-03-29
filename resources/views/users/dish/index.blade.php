@extends('layouts.app')
@section('content')
@include('layouts.registered_nav')

<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container">
  <div class="backend_wrap">
    <h1>Elenco pietanze</h1>
    <div class="content_row">
      <a id="glovo_btn" class="text-white" href="{{ route('user.dish.create') }}">
        Crea Nuovo piatto
      </a>
      <table class="table">
        <thead>
          <tr>
            <th>Piatto ID</th>
            <th>Nome</th>
            <th>Immagine</th>
            <th>Prezzo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dishes as $dish)
          <tr>
            <td scope="row">{{$dish->id}}</td>
            <td>{{$dish->name}}</td>
            <td>
              @if ($dish->img)
              <img src="{{asset('storage/' . $dish->img )}}" style="height:50px;" alt="">
              <img src="{{$dish->img}}" style="height:50px;" alt="">
              @else
              <p class="card-text text-danger">N/A</p>
              @endif
            </td>
            <td>{{$dish->price}}</td>
            <td>

              <a class="btn btn-primary" href="{{ route('user.dish.show', $dish) }}">Show</a>
              <a class="btn btn-warning" href="{{ route('user.dish.edit', $dish) }}">Edit</a>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$dish->id}}">
                Delete
              </button>

              <!-- Modal -->
              <div class="modal fade text-dark" id="delete-{{$dish->id}}" tabindex="-1" role="dialog" aria-labelledby="dish-delete-{{$dish->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Dish {{$dish->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Sei sicuro?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{{route('user.dish.destroy', $dish->id )}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-block">delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Modal -->

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection