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

    Route::get('popularity/{user_id}/{popularity}', 'ProfileController@increasePopularity')->name('profile.popularity');

	Route::post('{user_id}/update', 'ProfileController@update')->name('profile.update');

	Route::post('{user_id}/password', 'ProfileController@changePassword')->name('profile.password');
});

Route::prefix('message')->group(function () {
    Route::get('{user_id}', 'MessageController@show')->name('inbox.show');

    Route::post('{user_id}', 'MessageController@sendMessage')->name('inbox.send');

    Route::post('{message_id}/{receiver_id}', 'MessageController@deleteMessage')->name('inbox.delete');
});

Route::prefix('thread')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('/', 'ThreadController@save')->name('thread.save')->middleware('can:create,App\Thread');

        Route::post('{thread_id}/update', 'ThreadController@update')->name('thread.update')->middleware('can:create,App\Thread');

        Route::get('insert', 'ThreadController@create')->name('thread.create');

        Route::get('{thread_id}/update', 'ThreadController@edit')->name('thread.edit');

        Route::get('history', 'ThreadController@userThread')->name('thread.history');

        Route::get('{thread_id}/delete', 'ThreadController@destroy')->name('thread.delete');

        Route::get('{thread_id}/close', 'ThreadController@close')->name('thread.close');

        Route::get('master', 'ThreadController@showMaster')->name('thread.master');

        Route::get('{thread_id}/detail', 'ThreadController@detail')->name('thread.detail');
    });
});

Route::prefix('comment')->group(function () {
    Route::post('/', 'CommentController@store')->name('comment.store');

    Route::get('{comment_id}/edit', 'CommentController@edit')->name('comment.edit');

    Route::post('{comment_id}/update', 'CommentController@update')->name('comment.update');

    Route::get('{comment_id}/delete', 'CommentController@destroy')->name('comment.delete');
});

Route::prefix('category')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('/', 'CategoryController@store')->name('category.store');

        Route::get('{category_id}/delete', 'CategoryController@destroy')->name('category.delete');

        Route::post('{category_id}/update', 'CategoryController@update')->name('category.update');

        Route::get('{category_id}/update', 'CategoryController@edit')->name('category.edit');

        Route::get('master', 'CategoryController@showMaster')->name('category.master');
    });
});

Route::prefix('user')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('insert', 'UserController@create')->name('user.create');

        Route::post('insert', 'UserController@save')->name('user.save');

        Route::get('{user_id}/delete', 'UserController@destroy')->name('user.delete');

        Route::post('{user_id}/update', 'UserController@update')->name('user.update');

        Route::get('{user_id}/update', 'UserController@edit')->name('user.edit');

        Route::get('master', 'UserController@showMaster')->name('user.master');
    });
});
