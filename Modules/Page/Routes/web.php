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

Route::prefix('page')->group(function() {
    Route::get('/', 'PageController@index');

});

Route::middleware('lang')->group(function () {

    Route::get('/', 'HomeController@index');
    Route::get('/app_list', 'HomeController@applist');
    Route::get('/rules', 'HomeController@rule_policy');
    Route::get('/cat/game', 'HomeController@cat_game');
    Route::get('/html-game', 'HomeController@html_game');
    Route::post('/subscribe', 'HomeController@subscribe');
    Route::get('/help-center', 'HomeController@help_center');
    Route::get('/how-to-play', 'HomeController@how_to_play');
    Route::post('/app-game/search', 'HomeController@search');
    Route::post('/get_cat_details', 'HomeController@get_cat_details');
    Route::get('/game/details/{id}', 'HomeController@html_game_details');

});

Route::post('/changlang', 'HomeController@changlang');
