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

Route::get('/','VmaroController@index');
Route::get('login/twitter', 'Auth\LoginController@redirectToProvider')->name('loginTwitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Auth::routes();

Route::get('users/{id}', 'UsersController@show');

Route::resource('posts', 'PostsController');

Route::get('/home', 'HomeController@index')->name('home');
