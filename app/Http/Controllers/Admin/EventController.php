<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\Tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event :: all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag :: all();

        return view('events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $user = Auth::user();
        // dd($user);

        $newEvent = new Event();

        $newEvent -> nome_evento = $data['nome_evento'];
        //associo percorso file a campo img della tabella
        $newEvent -> img_riferimento = $data['img_riferimento'];
        $newEvent -> descrizione = $data['descrizione'];
        $newEvent -> data_pubblicazione = $data['data_pubblicazione'];

        $newEvent -> user() -> associate($user);

        $newEvent -> save();

        //creazione relazione molti a molti
        $newEvent -> tags() -> attach($data['tag_id']);

        return redirect() -> route('events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event :: find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event :: find($id);
        $tags = Tag :: all();

        return view('events.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $event = Event :: find($id);
        
        $event -> nome_evento = $data['nome_evento'];
        $event -> img_riferimento = $data['img_riferimento'];
        $event -> descrizione = $data['descrizione'];
        $event -> data_pubblicazione = $data['data_pubblicazione']; 
        
        $event -> save();

        $event -> tags() -> sync($data['tag_id']);

        return redirect() -> route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event :: find($id);

        $event -> tags() -> sync([]);

        $event -> delete();

        return redirect() -> route('events.index', compact('event'));
    }
}
