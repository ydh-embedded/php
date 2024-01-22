<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$songs = Song::all();
        $songs   = Song::join('labels','labels_id_ref','=','labels.id')
            ->select('songs.id','songs.title','songs.band','labels.name')
            ->orderBy('songs.title','asc')
            ->get();
        return view('songs.index',['songs' => $songs])          ;   //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $labels = DB::table('labels')->select('id','name',)->get();
        return view ('songs.create',['labels'=> $labels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $song = new Song(); //return 'store' ; //

        $validatedData = $request->validate(['title'=>'required|min:2','band'=> 'required' , 'labels_id_ref'=> 'required']);       //wir verifizieren


        $song->title            = $validatedData   ['title']        ;
        $song->band             = $validatedData   ['band']         ;
        $song->labels_id_ref    = $validatedData   ['labels_id_ref'];

        $song->save();                          //mit save speichern wir den input
        return redirect('/songs');              //mit redirection leiten wir die seite weiter

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          //$song = Song::findOrFail($id);
        $song   = Song::join('labels','labels_id_ref','=','labels.id')
        ->select ( 'songs.title','songs.band','labels.name')
        ->where  ( 'songs.id','=', $id )
        ->orderBy( 'songs.title','asc' )

        ->firstOrFail();
        return view ('songs.show', compact ('song') );
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song   = Song::findOrFail($id);  //
        $labels =   DB::table('labels')->select('id','name',)->get();

        return view('songs.edit', ['song'=>$song , 'labels' =>$labels]) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::find($id);
        
        $validatedData          = $request->validate(['title'=>'required|min:2','band'=> 'required' , 'labels_id_ref'=> 'required']);
        $song->title            = $validatedData   ['title']        ;
        $song->band             = $validatedData   ['band']         ;
        $song->labels_id_ref    = $validatedData   ['labels_id_ref'];

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
