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

// Guest Route
Route::prefix('/')->group(function () {
	Route::get('/', function () {
		return view('main.index');
	});
	Route::get('/pencarian', function () {
		return view('main.pencarian');
	});
	Route::get('/about', function () {
		return view('main.about');
	});
	Route::get('/login', function () {
		return view('main.login');
	});
});

// Admin Route
Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'PengaduanController@index');
	Route::get('histori', 'PengaduanController@histori');
});

// Pengaduan Resource
Route::post('pengaduan/filter', 'PengaduanController@filter')->name('pengaduan.filter');
Route::post('pengaduan/pencarian', 'PengaduanController@pencarian')->name('pengaduan.pencarian');
Route::match(['put', 'patch'], 'pengaduan/feedback/{status}', 'PengaduanController@feedback')->name('pengaduan.feedback');
Route::resource('pengaduan', 'PengaduanController')->except([
	'create', 'show', 'edit'
]);
