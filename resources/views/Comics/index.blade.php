{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Fumetti</h1>
    </div>
    <div class="container my-5 d-flex gap-3 flex-wrap ">
        @foreach ($comics as $comic)
            <div class="card" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top img-fluid fixed-height" alt="{{ $comic->series }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->series }}</h5>
                    <span>{{ $comic->price }}</span>
                    <br>
                    <small>{{ $comic->type }}</small>
                </div>
                <a href="{{ route('comics.show', $comic) }}" class="btn btn-success">Dettaglio</a>
                <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning">Modifica</a>
            </div>
        @endforeach
    </div>
@endsection

@section('titlePage')
    Fumetti
@endsection
