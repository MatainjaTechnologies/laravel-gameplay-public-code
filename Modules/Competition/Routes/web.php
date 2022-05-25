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

Route::prefix('competition')->group(function() {

    Route::middleware('lang')->group(function () {
        Route::get('/', 'CompetitionController@index')->middleware('lang');
    });
    // Route::get('/winner', 'CompetitionController@winner');
});

// Route::get('/admin/competition', 'CompetitionController@show');
Route::post('admin/competition/submit', 'CompetitionController@store');
Route::post('/admin/competition/delete', 'CompetitionController@destroy');
Route::post('admin/competition/{id}/update', 'CompetitionController@update');
Route::post('admin/competition/ajax_competition_list', 'CompetitionController@ajax_competition_list');
Route::get('/admin/competition/{game}/edit_competition_view', 'CompetitionController@edit_competition_view');

Route::middleware('admin')->group(function () {
    Route::get('admin/competition/show', 'CompetitionController@show');
    Route::get('admin/competition/{id}/edit', 'CompetitionController@edit');
    Route::get('/admin/competition/addcompetition', 'CompetitionController@create');
});

