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

use App\Travel;
use App\Switch_DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newTravel', function() {
    return view('newTravel');
})->name('newTravel');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/saveNewTravel', 'HomeController@store');

Route::get('/travels/{destination}', 'HomeController@show');


