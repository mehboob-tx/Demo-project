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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/','AdminController@login');
//Route::get('register','AdminController@register');

Route::get('index','AdminLoginController@showLoginForm');
Route::post('admin-login','AdminLoginController@login')->name('admin.login');

Route::get('register','AdminRegisterController@showRegisterForm');
Route::put('admin-register','AdminRegisterController@create')->name('admin.register');

Route::get('table','AdminController@index');

Route::get('create','AdminController@create');
Route::post('store','AdminController@store');

Route::get('edit/{id}','AdminController@edit');
Route::put('update/{id}','AdminController@update');

Route::delete('destroy/{id}','AdminController@destroy');

Route::get('show','UserLoginController@showLoginForm');
Route::post('user-login','UserLoginController@login');

Route::get('user','UserController@index');







Route::get('admin','AdminController@admin');
