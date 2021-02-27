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
Route::get('/', 'ReservationsController@index')->name('/');

//ユーザー新規登録
Route::get('/users/create', 'Auth\RegisterController@showRegistrationForm')->name('users.create');
Route::post('/users/register', 'Auth\RegisterController@registerUser')->name('users.register');

Route::get('/reservations/{year}/{month}/{day}', 'ReservationsController@create')->name('reservations.create');
Route::post('/reservations/checkStore', 'ReservationsController@checkStore')->name('reservations.checkStore');
Route::get('/reservations/check', 'ReservationsController@check')->name('reservations.check');
Route::get('/reservations/store', 'ReservationsController@store')->name('reservations.store');
Route::get('/reservations/revise', 'ReservationsController@revise')->name('reservations.revise');



//管理者側↓
Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');

//管理者ログイン後アクセスするもの
Route::group(['prefix' => 'admin', 'as' =>'admin.', 'middleware' => ['auth', 'can:admin']], function () {
    Route::get('index', 'Admin\AdminController@index')->name('index');
    Route::get('search', 'Admin\AdminController@search')->name('search');
    // 予約編集系↓
    Route::get('showDetail/{id}', 'Admin\AdminController@showDetail')->name('showDetail');

    Route::get('editReserve/{id}', 'Admin\AdminController@editReserve')->name('editReserve');
    Route::put('editReserve/{id}', 'Admin\AdminController@rePostReserve')->name('editReserve');

    Route::get('confirmReserve/{id}', 'Admin\AdminController@confirmReserve')->name('confirmReserve');
    Route::post('confirmReserve/{id}', 'Admin\AdminController@updateReserve')->name('confirmReserve');
    Route::delete('delete/{id}', 'Admin\AdminController@delete')->name('delete');
    // 予約編集系↑

    Route::post('logout', 'Admin\LoginController@logout')->name('logout');
});
