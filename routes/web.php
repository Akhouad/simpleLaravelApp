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

Route::get('/home', 'HomeController@newsfeed')->name('home');
Route::get('/newsfeed', 'HomeController@newsfeed');

Route::get('/profil/{id}', 'ProfileController@showProfile');
Route::post('/profil/{id}', 'ProfileController@insertPost')->where('id', '[0-9]+');

Route::get('/profil/{id}/edit', 'ProfileController@editProfile');
Route::post('/profil/{id}/edit', 'ProfileController@updateInfo');

Route::post('/profil/store', 'ProfileController@storeImage');

Route::get('/post/delete/{id}/{user_id}', 'PostController@delete');
