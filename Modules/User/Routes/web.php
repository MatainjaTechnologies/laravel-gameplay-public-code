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

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    Route::get('/register', 'UserController@create');
    Route::post('/store/submit', 'UserController@store');
    Route::get('/show', 'UserController@show');
    Route::get('/login_email', 'UserController@login_email');
    Route::get('/verify/{token}/{key}', 'UserController@verify');
});

Route::prefix('login')->group(function() {
    /* Route::get('/', 'UserController@login'); */
    Route::get('/email', 'UserController@login_email');
});

Route::middleware('lang')->group(function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/profile/settings', 'SettingController@index');
});

Route::get('/logout', 'UserController@logout');
Route::get('/registration', 'UserController@create');
Route::post('/user_login', 'UserController@user_login');
Route::get('/login/email', 'UserController@login_email');
Route::get('/registration/success', 'UserController@show');
Route::get('/registration/terms-and-condition', 'UserController@termsandcondition');

Route::middleware('admin')->group(function () {
    Route::get('/admin/users', 'UserController@user_list');
});

