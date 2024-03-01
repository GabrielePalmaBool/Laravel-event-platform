@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $event->nome_evento }}</h1>
                    <img src="{{ $event->img_riferimento }}" alt="Immagine di riferimento">
                    <p>{{ $event->descrizione }}</p>
                    <span>{{ $event->data_pubblicazione }}</span>
                    <ul class="list-inline">
                        @foreach ($event->tags as $tag)
                            <li class="list-inline-item">
                                <span class="btn btn-info">#{{ $tag->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p>{{ $event->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
