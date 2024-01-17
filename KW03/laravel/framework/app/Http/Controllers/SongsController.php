<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index',['songs' => $songs])          ;   //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view ('songs.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $song = new Song(); //return 'store' ; //

        $validatedData = $request->validate(['title'=>'required|min:2','band'=> 'required']);       //wir verifizieren


        $song->title = $validatedData   ['title']       ;
        $song->band  = $validatedData   ['band']        ;

        $song->save();                          //mit save speichern wir den input
        return redirect('/songs');              //mit redirection leiten wir die seite weiter

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::findOrFail($id);  //
        return view ('songs.show', compact ('song') );
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::findOrFail($id);  //
        return view('songs.edit') ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::find($id);
        
        $validatedData  = $request->validate(['title'=>'required|min:2','band'=> 'required']);
        $song->title    = $validatedData   ['title']       ;
        $song->band     = $validatedData   ['band']        ;

        $song->save();                          //mit save speichern wir den input
        return redirect('/songs');              //mit redirection leiten wir die seite weiter
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $song = Song::find($id);
        $song->delete();                          //mit delete löschen wir den input
        return redirect('/songs');              //mit redirection leiten wir die seite weiter
    }
}
