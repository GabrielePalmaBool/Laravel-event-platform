@extends('layouts.app')
@section('content')

<h1>Nuovo evento</h1><br><br>

<div class="container">
    <form action="{{route('events.update', $event->id)}}" method="POST">

        @csrf
        @method('PUT')

        <label for="nome_evento">Nome evento</label>
        <input type="text" name="nome_evento" id="nome_evento" value="{{ $event->nome_evento }}"><br><br>

        <label for="img_riferimento">Immagine del progetto</label>
        <input class="form-control" type="file" name="img_riferimento" id="img_riferimento" value="{{ $event->img_riferimento }}"><br><br>

        <label for="descrizione">Descrizione</label>
        <input type="textarea" name="descrizione" id="descrizione" value="{{ $event->descrizione }}"><br><br>

        <label for="data_pubblicazione">Data</label>
        <input type="date" name="data_pubblicazione" id="data_pubblicazione" value="{{ $event->data_pubblicazione }}"><br><br>

        @foreach ($tags as $tag)
        <input 
            type="checkbox" 
            name="tag_id[]" 
            value="{{ $tag->id }}"
            @foreach ($event->tags as $event_tag)
                @if ($tag->id == $event_tag->id)
                    checked
                @endif
            @endforeach
        >
        <label class="checkbox-inline"> {{ $tag->name }}</label>
            
        @endforeach

        <br><br><input type="submit" value="Modifica">
    </form>
</div>


@endsection