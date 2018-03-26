@extends('layouts.app')

@section('content')
<h1>Voeg een nieuwe game toe</h1>

<div class="container">
    <!--<h1>Games</h1>-->
    @if ($errors->any())
        <div class=“alert alert-danger”>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> </div>
    @endif
    <form method="POST">
        <label for="name">Naam</label>
        <input type="text" name="name" id="name"/>

        <label for="description">Beschrijving</label>
        <textarea name="description" id="description"/></textarea>

        <label for="price">Prijs</label>
        <input type="number" name="price" id="price"/>

        <label for="status"><input type="checkbox" value="1" name="available" checked>Active</label>

        <label for="status"><input type="checkbox" value="1" name="highlighted" checked>Highlighted</label>

        {{ csrf_field() }}

        <input type="submit" name="submit" value="Opslaan">
    </form>
</div>
@endsection