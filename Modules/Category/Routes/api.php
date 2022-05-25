<?php

use Illuminate\Http\Request;
use Modules\Category\Entities\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('api')->get('/category', function (Request $request) {
//      return Category::all();
// });
// Route::get('admin/category/all', 'CategoryApiController@category');
Route::middleware('api')->get('/category','CategoryApiController@category');
//Route::get('data', 'CategoryApiController@data');
Route::get('category/{id}/game', 'CategoryApiController@categorygame');
//Route::get('category/topchart/game', 'CategoryApiController@category_game');
