<?php

use App\Models\Articel;
use App\Models\Category;

use App\Http\Controllers\ArticelsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\infosController;

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
/*  return ['Laravel' => app()->version()]; */
    return view('shop');
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
    return $db = DB::table('categories')->get();
}); */

// Wir wollen den Controller aufrufen
Route::get( '/infos', [infosController::class, 'function'] );

Route::resource('/articels', ArticelsConroller::class);


Route::resource('/categories', CategoriesConroller::class);



require __DIR__.'/auth.php';
