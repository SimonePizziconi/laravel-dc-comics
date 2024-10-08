{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        @if (session('deleted'))
            <div class="alert alert-primary" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
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
                    <br>
                    <a href="{{ route('comics.show', $comic) }}" class="btn btn-success"><i
                            class="fa-regular fa-eye"></i></a>
                    <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning"><i
                            class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm(Sei sicuro di voler eliminare {{ $comic->title }})">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('titlePage')
    Fumetti
@endsection
