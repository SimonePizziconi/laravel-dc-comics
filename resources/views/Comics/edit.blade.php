{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="series" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ $comic->series }}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Copertina Fumetto</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{ $comic->thumb }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo Fumetto</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $comic->price }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo Fumetto</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ $comic->type }}">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            <input class="btn btn-warning" type="reset" value="Reset">
        </form>
    </div>
@endsection

@section('titlePage')
    Aggiungi Fumetto
@endsection
