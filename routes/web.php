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

Route::get('/', 'HomeController@Home');

Route::get('/form', 'AuthController@Form');

Route::post('/welcome', 'AuthController@Welcome');

Route::get('/master', function(){
	return view("layouts.master");
});

Route::get('/data-tables', function(){
	return view("data-table");
});
