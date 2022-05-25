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

Route::prefix('banner')->group(function() {
    Route::get('/', 'BannerController@index');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/banners', 'BannerController@index');
});

Route::post('/banners/create', 'BannerController@create');
Route::post('/edit_banner', 'BannerController@editBanner');
Route::post('/banner_details', 'BannerController@banner_details');
