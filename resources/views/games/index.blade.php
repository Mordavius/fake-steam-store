@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Games</h1>

        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if(Session::has('succes'))
            <div class="alert alert-succes">{{ Session::get('succes') }}</div>
        @endif

        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4">
                    <div class="card game">
                        <h2>{{$game->name}}</h2>
                        {{ str_limit($game->description, 125, ' ...') }}
                        @if(Auth::user())
                            <a class="add_button" href="/library/add/{{$game->id}}">Add to Library</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection