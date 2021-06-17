<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/simpan_barang','Barangcontroller@store');
Route::delete('/hapus_barang/{id_barang}','Barangcontroller@destroy');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('barang', 'Barangcontroller@barang');

Route::get('semuabarang', 'Barangcontroller@barangAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
