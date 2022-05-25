<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

 Route::get('/utpal', function(){
   print_r("utpal");
});

 Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/');
});

 Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
  
    dd("Cache Clear All");
});

