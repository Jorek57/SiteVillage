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

Route::get('/', 'IndexController@index');
Route::get('actu', 'ActuController@index');
Route::get('login', 'LoginController@getPage');
Route::post('login', 'LoginController@postPage');
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');
