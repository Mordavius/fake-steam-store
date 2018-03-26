@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Library</h1>


        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4">
                    <div class="card game">
                        <h2>{{$game->name}}</h2>
                        <p>{{$game->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection