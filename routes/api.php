<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

////////////PETUGAS

Route::post('register', 'PetugasController@register');
Route::post('login', 'petugasController@login');
Route::put('/ubah_petugas/{id}','PetugasController@update');
Route::delete('/hapus_petugas/{id}','PetugasController@hapus');
Route::get('/tampil_petugas','PetugasController@tampil_petugas');
Route::get('/',function(){
    return Auth::user()->level;
});

/////////////PENYEWA

Route::post('/tambah_penyewa', 'PenyewaController@store');
Route::put('/ubah_penyewa/{id}','PenyewaController@update');
Route::delete('/hapus_penyewa/{id}','PenyewaController@hapus');
Route::get('/tampil_penyewa','PenyewaController@tampil_penyewa');

/////////////DATA MOBIL

Route::post('/tambah_data', 'data_mobilController@store');
Route::put('/ubah_data/{id}','data_mobilController@update');
Route::delete('/hapus_data/{id}','data_mobilController@hapus');
Route::get('/tampil_data','data_mobilController@tampil_data');

/////////////JENIS MOBIL

Route::post('/tambah_jenis', 'jenis_mobilController@store');
Route::put('/ubah_jenis/{id}','jenis_mobilController@update');
Route::delete('/hapus_jenis/{id}','jenis_mobilController@hapus');
Route::get('/tampil_jenis','jenis_mobilController@tampil_jenis');