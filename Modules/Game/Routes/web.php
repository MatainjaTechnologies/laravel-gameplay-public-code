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

Route::prefix('game')->group(function() {
    // Route::get('/', 'GameController@index');

    Route::middleware('lang')->group(function () {
        Route::get('/html-game', 'GameController@index');
        Route::get('/{uuid}', 'GameController@game_details');
    });

    //Admin routes
    Route::post('/admin/store', 'GameController@store');
    Route::post('/admin/delete', 'GameController@destroy');
    Route::post('/admin/edit_game', 'GameController@edit_game');
    Route::post('admin/ajax_game_list', 'GameController@ajax_game_list');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/list', 'GameController@list');
        Route::get('/admin/create', 'GameController@create');
        Route::get('/admin/edit/{game}', 'GameController@edit_game_view');
    });
});

Route::middleware('lang')->group(function () {
    Route::get('/search', 'GameController@search');
    Route::get('/competition/{id}/game/{uuid}', 'GameController@comp_game_details');
});


