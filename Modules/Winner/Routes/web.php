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

Route::prefix('winner')->group(function() {

    Route::middleware('lang')->group(function() {
        Route::get('/', 'WinnerController@index');
        Route::get('/search', 'WinnerController@date_search');
    });

});

Route::get('/admin/winners', 'WinnerController@winners');
Route::get('/admin/leaderboard', 'WinnerController@leaderboard');
