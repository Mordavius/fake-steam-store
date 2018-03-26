<?php

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

// zet de default route maar ff op games.
Route::get('/', function () {
    return redirect('games');
});
// library ophalen en iets om een game toe te voegen.

Auth::routes();


//GET
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/games', 'GamesController@index')->name('games');
Route::get('/games/new', 'GamesController@new')->name('new_game');
Route::get('/library', 'LibraryController@index')->name('library');
Route::get('/library/add/{id}', 'LibraryController@add')->name('add_to_library');
Route::get('/games/search', 'GamesController@search')->name('search_game');
//POST
Route::post('/games/new', 'GamesController@create');
Route::post('/games/ajax', 'GamesController@searchbystring');