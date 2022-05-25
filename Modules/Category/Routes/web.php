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

Route::prefix('category')->group(function() {
    
    Route::middleware('lang')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/{id}/game', 'CategoryController@category_game');
        // Route::post('admin/category_details', 'CategoryController@category_details');
    });

});

// Route::get('{type}/admin/categories', 'CategoryController@category');
Route::post('/admin/category/delete', 'CategoryController@destroy');
Route::post('admin/category/store', 'CategoryController@cat_store');
Route::post('admin/category/update', 'CategoryController@cat_update');
Route::post('admin/category/update_status', 'CategoryController@update_status');

Route::middleware('admin')->group(function () {
    Route::get('admin/category/add', 'CategoryController@create');
    Route::get('admin/category/all', 'CategoryController@category');
    Route::get('admin/category/{uuid}/edit', 'CategoryController@edit');
});

Route::post('/game/see_more', 'CategoryController@see_more');
