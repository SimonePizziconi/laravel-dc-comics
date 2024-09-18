{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="series" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series"
                    value="{{ old('series') }}">
                @error('series')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Copertina Fumetto</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                    id="thumb" value="{{ old('thumb') }}">
                @error('thumb')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo Fumetto</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price') }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo Fumetto</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type"
                    value="{{ old('type') }}">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            <input class="btn btn-warning" type="reset" value="Reset">
        </form>
    </div>
@endsection

@section('titlePage')
    Aggiungi Fumetto
@endsection
