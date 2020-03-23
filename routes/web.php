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



//Route::get('register', 'usersController@register')->name('image.upload');
//Route::post('register', 'usersController@registerPost')->name('user.post');

//Route::get('/', 'UserController@index');
//Route::get('/user', 'UserController@show');

Route::resource('user', 'UserController'); 