@extends('layouts.app')
@section('content')

<h1>{{ $event -> nome_evento }}</h1><br>
<img src="{{ $event -> img_riferimento }}" alt="img"><br><br>
<p>{{ $event -> descrizione }}</p>
<span>{{ $event -> data_pubblicazione }}</span>

@endsection