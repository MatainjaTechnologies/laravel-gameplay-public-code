<?php

use Illuminate\Http\Request;
use Modules\Competition\Entities\Competition;
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

// Route::middleware('auth:api')->get('/competition', function (Request $request) {
//     return $request->user();
// });
//Route::middleware('api')->get('/competition','CompetitionApiController@competition');
Route::get('/competition', 'CompetitionApiController@competition')->name('competition');
