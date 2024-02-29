@extends('layouts.app')
@section('content')

<h1>Eventi</h1><br><br>
<ul>
    @foreach ($events as $event)
    <li>
        <a href="{{ route('events.show', $event -> id) }}">{{ $event -> nome_evento }}</a>
    </li>
    @endforeach
</ul>
@endsection