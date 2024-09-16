{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>{{ $comic->series }}</h1>
    </div>
    <div class="container">
        <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
            <img src="{{ $comic->thumb }}" class="card-img-top img-fluid fixed-height" alt="{{ $comic->series }}">
            <div class="card-body">
                <span>{{ $comic->price }}</span>
                <br>
                <small>{{ $comic->type }}</small>
            </div>
            <a href="{{ route('comics.index') }}" class="btn btn-warning">Ritorna alla lista fumetti</a>
        </div>
    </div>
@endsection

@section('titlePage')
    {{ $comic->slug }}
@endsection
