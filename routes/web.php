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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newTravel', function() {
    return view('newTravel');
})->name('newTravel');

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/newTravel', 'TravelController@create')->name('travel.create'); ezzel van valami hiba
Route::post('/saveNewTravel', 'TravelController@store');

//Route::get('/travels/{destination}', 'HomeController@show')->name('travel.show');

Route::get('/travels/{destination}', function() {
    return view('/indTravel');
});

