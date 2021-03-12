@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Elenco pietanze</h1>
    <a class="text-white" href="{{ route('user.dish.create') }}">
        <ul class="list-group">
            <li class="list-group-item active text-center">
                Crea Nuovo piatto
            </li>
        </ul>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>piatto ID</th>
                <th>Nome</th>
                <th>prezzo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td scope="row">{{$dish->id}}</td>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->price}}</td>
                    <td>
                        <div class="dropdown open">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Option
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ route('user.dish.edit', $dish) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('user.dish.show', $dish) }}">Show</a>
    
                                <form class="" action="{{route('user.dish.destroy', $dish->id )}}" method="post">
                                    @csrf
                                    @method('delete')
                                   <button type="submit" class="btn btn-danger btn-block">delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection