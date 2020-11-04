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
Route::get('/users/create', 'Auth\RegisterController@showRegistrationForm');
Route::post('/users/confirm', 'Auth\RegisterController@showConfirmation')->name('newUser.confirm');
Route::post('/users/register', 'Auth\RegisterController@userRegister')->name('newUser.register');

Route::get('/', function () {
    return view('welcome');
});
