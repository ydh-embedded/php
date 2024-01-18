<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});



Route::get('/shop', function () {
    $id = request('id');

    return view('Artikel-Nummer', ['Artikel-Nummer'=> $id ]);
});




require __DIR__.'/auth.php';
