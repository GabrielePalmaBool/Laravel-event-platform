@extends('layouts.app')
@section('content')

<h1>Nuovo evento</h1><br><br>

<div class="container">
    <form action="{{route('events.store')}}" method="POST">

        @csrf
        @method('POST')

        <label for="nome_evento">Nome evento</label>
        <input type="text" name="nome_evento" id="nome_evento"><br><br>

        <label for="img_riferimento">Immagine del progetto</label>
        <input class="form-control" type="file" name="img_riferimento" id="img_riferimento"><br><br>

        <label for="descrizione">Descrizione</label>
        <input type="textarea" name="descrizione" id="descrizione"><br><br>

        <label for="data_pubblicazione">Data</label>
        <input type="date" name="data_pubblicazione" id="data_pubblicazione"><br><br>

        @foreach ( $tags as $tag )

                <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $tag -> id}}"> {{ $tag ->name}}
   
        @endforeach


        <br><br><input type="submit" value="CREA">
    </form>
</div>


@endsection