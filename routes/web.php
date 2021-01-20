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

Route::resource('/reservations', 'ReservationsController',['only'=>['create','store']]);

//管理者側↓
Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');
    //管理者ログイン後アクセスするもの
Route::group(['middleware' => ['auth', 'can:admin']], function(){
    Route::get('/admin/index', function(){
        return view('admin.index');
    })->name('admin.index');
    Route::post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
});
