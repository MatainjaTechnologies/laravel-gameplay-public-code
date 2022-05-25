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

Route::prefix('content')->group(function() {
    Route::get('/', 'ContentController@index');
    //Route::get('/wallpaper', 'ContentController@wallpaper');
    Route::get('/admin/app', 'ContentController@create_app');
    Route::post('/admin/app_store', 'ContentController@app_store');
    Route::get('/admin/app-list', 'ContentController@app_list');
	Route::post('/admin/ajax_content_list', 'ContentController@ajax_content_list');
	Route::get('/admin/wallpaper', 'ContentController@create_wallpaper');
	Route::post('/admin/app_wallpaper', 'ContentController@store_wallpaper');
	Route::get('/admin/wallpaper-list', 'ContentController@wallpaper_list');
	Route::get('/admin/video', 'ContentController@create_video');
	Route::post('/admin/video_store', 'ContentController@store_video');
	Route::get('/admin/video-list', 'ContentController@video_list');
	Route::post('/getDetailsByCatId', 'ContentController@getDetailsByCatId');

	Route::get('/admin/media/add', '\Modules\Media\Http\Controllers\MediaController@create');
	Route::post('/admin/media/media_store', '\Modules\Media\Http\Controllers\MediaController@media_store');
	Route::get('/admin/media', '\Modules\Media\Http\Controllers\MediaController@index');
	Route::post('/admin/ajax_media_list', 'ContentController@ajax_media_list');


});

/*Route::prefix('wallpaper')->group(function() {
	Route::get('/', 'WallpaperController@index');
	Route::get('/details/{id}', 'WallpaperController@wallpaper_details');
	Route::get('/more', 'WallpaperController@see_more');
});

Route::prefix('video')->group(function() {
	Route::get('/details/{id}', 'WallpaperController@video_details');
	Route::get('/more', 'WallpaperController@see_more_video');
});


Route::prefix('app')->group(function() {
	Route::get('/', 'AppController@index');
	Route::get('/game/details/{id}', 'AppController@game_details');
	Route::get('/game/more', 'AppController@more_game');
	Route::get('/details/{id}', 'AppController@app_details');
	Route::get('/more', 'AppController@more_app');

	// Route::get('/download/{id}', 'AppController@download');

});*/

Route::get('/{type}/download/{uuid}', 'AppController@download');
Route::get('/search', 'ContentController@search')->name("search");


