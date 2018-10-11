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
    return view('home');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::post('/login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
	Route::get('/', 'ProfileController@show')->name('profile.show');
	Route::get('update', 'ProfileController@edit')->name('profile.show.update');
	Route::post('{user}/update', 'ProfileController@update')->name('profile.update');
});
