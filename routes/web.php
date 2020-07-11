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

// hanya bisa diakses kalau sudah log in
Route::group(['middleware' => 'auth'], function() {
	// Jawaban
	Route::get('/jawaban/{id}/create', 'JawabanController@create'); // membuat jawaban dengan id tertentu
	Route::post('/jawaban/{id}', 'JawabanController@store'); // menyimpan jawaban baru untuk pertanyaan dengan id.question
	Route::get('/jawaban/{id}/edit', 'JawabanController@edit'); // display edit for answer.id
	Route::put('/jawaban/{id}', 'JawabanController@update'); // proses update answer.id
	Route::delete('/jawaban/{id}', 'JawabanController@destroy'); // delete answer.id

	// komentar
	Route::get('/komentar/{id}/create', 'CommentController@create'); // buat komentar baru
	Route::post('/komentar/{id}', 'CommentController@store'); // simpan komentar ke database
	Route::get('/komentar/{id}/edit', 'CommentController@edit'); // edit komentar dengan id tertentu
	Route::put('/komentar/{id}', 'CommentController@update'); // simpan perubahan pada db komentar
	Route::delete('/komentar/{id}', 'CommentController@destroy'); // hapus komentar dengan id tertentu
});

// route umum (bisa guest)
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jawaban/{id}', 'JawabanController@show'); // menampilkan  jawaban dari pertanyaan dengan id tertentu

Auth::routes();
Route::resource('pertanyaan', 'QuestionController');
