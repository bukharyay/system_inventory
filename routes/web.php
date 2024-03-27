<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPeminjam;
use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\LoginController;
#use App\Http\Controllers\VerifikasiController;

#get nampilke halaman
#post ambil data

 
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

#Route::get('/', [LoginController::class, 'login'])->name('login');
#Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
// =========AUTH LOGIN
Route::get('login', [AuthController::class, 'showLoginPage'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/peminjam', 'App\Http\Controllers\PeminjamController@create');

Route::post('peminjam.store', 'App\Http\Controllers\PeminjamController@store')->name('peminjam.store');

Route::get('/data-peminjam', [DataPeminjam::class, 'index']);

Route::get('DataPeminjam', [DataPeminjamController::class, 'index']);

Route::get('tambahalat', 'App\Http\Controllers\TambahAlatController@create');

Route::post('tambahalat.store', 'App\Http\Controllers\TambahAlatController@store')->name('tambahalat.store');

#Route::get('verifikasi',[VerifikasiController::class,'index']) -> name ('verifikasi') ;


Route::get("/", function(){
return view("adminpage.alat");
});
