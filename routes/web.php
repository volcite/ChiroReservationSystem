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
Route::get('/','ReservationsController@index')->name('/');

//ユーザー新規登録
Route::get('/users/create', 'Auth\RegisterController@showRegistrationForm')->name('users.create');
Route::post('/users/register', 'Auth\RegisterController@registerUser')->name('users.register');

Route::get('/reservation/{year}/{month}/{day}', 'ReservationsController@create')->name('reservation.create');
