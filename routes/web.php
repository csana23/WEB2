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
use App\Switches;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//admin
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    //newTravel
    Route::get('/newTravel', 'AdminController@create');
    Route::post('/saveNewTravel', 'AdminController@store');
});

Route::get('/home', 'HomeController@index');

// Route::get('/newTravel', 'HomeController@create', function() {
//     return view('newTravel');
// });
Auth::routes();
// Route::post('/saveNewTravel', 'HomeController@store');
Route::get('/travels/{destination}', 'HomeController@show');

Route::get('/travels/{destination}/joinTravel', 'HomeController@joinTravel');




