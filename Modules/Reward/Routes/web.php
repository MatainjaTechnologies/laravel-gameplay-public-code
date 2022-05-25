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

Route::prefix('reward')->group(function() {
    Route::get('/', 'RewardController@index');
    Route::get('/{id}/details', 'RewardController@reward_details');
    Route::post('/get_rewards_by_type', 'RewardController@get_rewards_by_type');
    Route::get('/history', 'RewardController@reward_history')->middleware('appuser');
});

/* Reward Admin Routes */
Route::post('/admin/reward/store', 'RewardController@reward_store');
Route::post('/admin/reward/delete', 'RewardController@reward_delete');
Route::post('/admin/reward/update', 'RewardController@reward_update');
Route::post('/admin/reward/update_status', 'RewardController@update_status');

Route::middleware('admin')->group(function () {

    Route::get('/admin/reward/add', 'RewardController@add_reward');
    Route::get('/admin/reward/list', 'RewardController@reward_list');
    Route::get('/admin/reward/edit/{id}', 'RewardController@edit_reward');
    
    Route::get('/admin/prize/add', 'PrizeController@add_prize');
    Route::get('/admin/prize/list', 'PrizeController@prize_list');
    Route::get('/admin/prize/edit/{id}', 'PrizeController@edit_prize');
});

/* Prize Admin Routes */
Route::post('/admin/prize/store', 'PrizeController@prize_store');
Route::post('/admin/prize/update', 'PrizeController@prize_update');
Route::post('/admin/prize/delete', 'PrizeController@delete_prize');
Route::post('/admin/prize/details', 'PrizeController@prize_details');
