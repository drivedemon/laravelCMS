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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// create group middleware for many route
Route::middleware('auth')->group(function() {
  Route::resource('categories','CategoryController');
  Route::resource('posts','PostController');
  Route::resource('tags','TagsController');
  Route::get('users','UserController@index')->name('users.index');
});
// syntax middleware(['auth']) = check user authen if user authen then go to post or not cant go to post and redirect to login "auto"
// ==============  Route::resource('categories','CategoryController')->middleware(['auth']); ====================//

Route::get('/home', 'HomeController@index')->name('home');
