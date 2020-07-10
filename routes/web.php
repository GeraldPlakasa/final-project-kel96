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

// use Symfony\Component\Routing\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function(){
	return view("layouts.master");
});
Route::group(['moddleware' => 'auth'], function() {
	Route::get('/komentar/create', 'CommentController@create')->middleware('auth');
	Route::post('/komentar', 'CommentController@store');
	Route::get('/komentar/{id}', 'CommentController@show');
	Route::get('/komentar/{id}/edit', 'CommentController@edit');
	Route::put('/komentar/{id}', 'CommentController@update');
	Route::delete('/komentar/{id}', 'CommentController@destroy');

	// Jawaban
	Route::get('/jawaban/{id}', 'JawabanController@index'); // menampilkan  jawaban dari pertanyaan dengan id tertentu
	Route::get('/jawaban/{id}/create', 'JawabanController@create'); // membuat jawaban dengan id tertentu
	Route::post('/jawaban/{id}', 'JawabanController@store'); // menyimpan jawaban baru untuk pertanyaan dengan id.question
	Route::get('/jawaban/{id}/edit', 'JawabanController@edit'); // display edit for answer.id
	Route::put('/jawaban/{id}', 'JawabanController@update'); // proses update answer.id
	Route::delete('/jawaban/{id}', 'JawabanController@destroy'); // delete answer.id
});

Route::get('/komentar', 'CommentController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController');
