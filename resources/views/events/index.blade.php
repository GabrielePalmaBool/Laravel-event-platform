@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-5">Eventi</h1>
    @auth
        <a class="btn btn-success my-3" href="{{ route('events.create') }}" role="button">Nuovo evento</a>
    @endauth

    <ul class="list-group col-6 mx-auto">
        @foreach ($events as $event)

    
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <a class="link-underline link-underline-opacity-0 flex-grow-1" href="{{ route('events.show', $event->id) }}">
                    <h4 class="mb-0">{{ $event->nome_evento }}</h4>
                </a>

                @auth

                    @if ( $event->user->name == Auth::user() ->name )
                        <div class="btn-group" role="group">
                            <a class="btn btn-warning me-3" href="{{ route('events.edit', $event->id) }}">Modifica</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Rimuovi</button>
                            </form>
                        </div>
                    @endif

                @endauth

            </li>
           
            
        @endforeach
    </ul>

</div>

@endsection
