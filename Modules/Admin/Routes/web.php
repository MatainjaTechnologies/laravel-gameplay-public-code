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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('login');
    Route::post('/submit', 'AdminController@create');
    Route::get('/logout', 'AdminController@logout');
    
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');
    });

    Route::post('/set_cookie', 'AdminController@set_cookie');
});
