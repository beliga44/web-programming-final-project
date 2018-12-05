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

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::post('/login');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
	Route::get('/{user_id}', 'ProfileController@show')->name('profile.show');
	Route::get('update/{user_id}', 'ProfileController@edit')->name('profile.show.update');
	Route::get('password/{user_id}', 'ProfileController@showChangePasswordForm')->name('profile.show.password');
	Route::post('{user_id}/update', 'ProfileController@update')->name('profile.update');
	Route::post('{user_id}/password', 'ProfileController@changePassword')->name('profile.password');
    Route::get('{user_id}/{popularity}', 'ProfileController@increasePopularity')->name('profile.popularity');
});
