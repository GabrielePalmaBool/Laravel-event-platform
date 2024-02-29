@extends('layouts.app')
@section('content')

<h1>Eventi</h1><br><br>
<ul>
    @foreach ($events as $event)
    <li>
        <a href="{{ route('events.show', $event -> id) }}">{{ $event -> nome_evento }}</a>
        <a class="btn btn-warning me-3" href="{{ route('events.edit', $event->id) }}">Modifica</a>
    </li>
    @endforeach
</ul>

    <a class="btn btn-danger" href="{{ route('events.create') }}" role="button">Nuovo evento</a>

@endsection