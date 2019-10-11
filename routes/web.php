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
// middleware(['auth']) = check user authen if user authen then go to post or not cant go to post and redirect to login "auto"
Route::resource('categories','CategoryController')->middleware(['auth']);
Route::resource('posts','PostController')->middleware(['auth']);

Route::get('/home', 'HomeController@index')->name('home');
