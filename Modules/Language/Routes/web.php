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

Route::prefix('language')->group(function() {
    Route::get('/', 'LanguageController@index');
    Route::post('/store', 'LanguageController@store');
    Route::post('/edit_store', 'LanguageController@edit_store');
});

Route::get('/admin/language/add', 'LanguageController@create')->middleware('admin');
Route::get('/admin/language/all', 'LanguageController@language')->middleware('admin');
Route::get('admin/language/{id}/edit', 'LanguageController@edit')->middleware('admin');
Route::get('/admin/language/{id}/delete', 'LanguageController@delete')->middleware('admin');
