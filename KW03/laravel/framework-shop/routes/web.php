<?php

use Illuminate\Support\Facades\DB;
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

    return view('Artikel-Nummer', ['ArtikelNr'=> $id ]);
});

Route::get('/artikel', function () {
    return view('artikel-child');
});

Route::get('/category', function () {
    return view(        'category-child'        ,
    [
        'title'     =>  'Shop'                  ,
        'heading'   =>  'hier wird bestellt !'  ,
        'content'   =>  'Inhalt der category'   ,
        'footer'    =>  'copyright'
    ]);
});

/* Route::get('/db', function () {
    return $db = DB;
}); */




require __DIR__.'/auth.php';
