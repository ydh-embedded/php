<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticelsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articels = ArticelsController::join('/blade-Cadeg.CategName')
                    ->SELECT ('/blade-Artic.id ', '/blade-Artic.ArticName' , '/blade-Artic.ArticName_id_ref' , '/blade-Artic.ArticContent' , )
                    ->orderBy('/blade-Artic.created_at' , 'asc')
                    ->get();
        return view('/blade-Artic.index' , ['articels' => $articels ]);

    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}
