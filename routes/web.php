<?php
use App\Http\Controllers\Blog\PostController;
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

Route::get('/', 'WelcomeController@index');
Route::get('blog/post/{post}', [PostController::class, 'show'])->name('blog.show');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
// create group middleware for many route [user role]
Route::middleware('auth')->group(function() {
  Route::resource('categories','CategoryController');
  Route::resource('posts','PostController');
  Route::resource('tags','TagsController');
});
// create group middleware for many route [admin role]
Route::middleware(['auth', 'admin'])->group(function() {
  Route::get('users','UserController@index')->name('users.index');
  Route::post('users/{user}/makeadmin','UserController@makeadmin')->name('user.makeadmin');
});
// syntax middleware(['auth']) = check user authen if user authen then go to post or not cant go to post and redirect to login "auto"
// ==============  Route::resource('categories','CategoryController')->middleware(['auth']); ====================//
