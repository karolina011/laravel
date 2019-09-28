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

Route::get('user', 'MyController@show');
Route::get('register', 'MyController@createRegister');
Route::get('login', 'MyController@createLogin');
Route::get('dashboard', 'Dashboard@create');

Route::post('registerValidate', 'MyController@registerValidate');
Route::post('loginValidate', 'MyController@loginValidate');

Route::get('test', function (){
    return [1,3,4];
});
