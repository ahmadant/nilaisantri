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
// Route::get('/tampilan', function () {
//     return view('layouts.backend');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/laporan','HomeController@cetak')->name('laporan');
Route::group(['middleware'=>'auth'], function() {
    Route::get('/api/datatable/santri','SantriController@dataTable')->name('api.datatable.santri');
    Route::get('/api/datatable/kategori','KategoriController@data')->name('api.datatable.kategori');
    Route::get('/api/datatable/penilaian','PenilaianController@data')->name('api.datatable.penilaian');
    Route::resource('santri', 'SantriController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('penilaian', 'PenilaianController');
});
