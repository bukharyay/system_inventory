<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBarangAPI;
use App\Http\Controllers\DataPeminjamAPI;
use App\Http\Controllers\HistoryDeleteApi;
use App\Http\Controllers\pinjamAPI;
use App\Http\Controllers\UserAPI;

// ...

Route::get('peminjaman', [DataPeminjamAPI::class, 'index']);

Route::get('peminjaman/getData={nim}', [DataPeminjamAPI::class, 'getDatabyId']);

Route::post('/peminjaman/create', [DataPeminjamAPI::class, 'create']);

Route::put('/peminjaman/update/{id}', [DataPeminjamAPI::class, 'update']);

Route::delete('/peminjaman/delete/{id}', [DataPeminjamAPI::class, 'delete']);

Route::get('pinjam', [pinjamAPI::class, 'index']);

Route::get('historydelete', [HistoryDeleteApi::class, 'index']);

Route::get('data_alat', [DataBarangAPI::class, 'index']);

Route::get('info-login-nim/getData={id}', [UserAPI::class, 'getUserByNim']);

Route::get('info-login', [UserAPI::class, 'index']);

Route::get('pinjam/{id}', [pinjamAPI::class, 'getDatabyId']);

Route::delete('/pinjam/delete/{id}', [pinjamAPI::class, 'delete']);

Route::delete('/historyDelete/{id}', [HistoryDeleteApi::class, 'delete']);

// Route::delete('/history-delete/delete/{id}', [HistoryDeleteApi::class, 'delete']);

Route::delete('/data_alat/delete/{id}', [DataBarangAPI::class, 'delete']);



