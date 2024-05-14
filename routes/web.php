<?php

use App\Models\HistoryDelete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPeminjam;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pinjamController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\ListPinjamController;
use App\Http\Controllers\DashboardMhsController;
use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\HistoryDeleteController;
use App\Http\Controllers\HistoryPeminjamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#Route::get('/', [LoginController::class, 'login'])->name('login');
#Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
#Route::post('login', [AuthController::class, 'login'])->name('login');
// =========AUTH LOGIN
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class,'action_login'])->name('actionlogin');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('/download-pdf', [PdfController::class, 'downloadPdf'])->name('download.pdf');


// ALL
Route::get("/", function(){
    return view("login");
    });

Route::get('/data-alat', function () {
    
    if (!Auth::check()){
        return redirect('login');
    }

    return app()->call('App\Http\Controllers\DataBarangController@index');
})->name('data-alat');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// END OF ALL

// ADMIN
Route::middleware(['auth', 'cekrole:staff'])->group(function () {
    Route::get('tambahalat', 'App\Http\Controllers\TambahAlatController@create');
    Route::get('DataPeminjam', 'App\Http\Controllers\DataPeminjamController@index')->name('DataPeminjam');
    Route::get('HistoryPeminjam', 'App\Http\Controllers\HistoryDeleteController@index')->name('HistoryPeminjam');
    Route::get('/dashboard-admin', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/pdf-peminjaman', 'App\Http\Controllers\PdfController@index')->name('pdf.peminjaman');
    Route::post('tambahalat.store', 'App\Http\Controllers\TambahAlatController@store')->name('tambahalat.store');
    Route::put('/pinjam/{id}', 'App\Http\Controllers\DataPeminjamController@updateKonfirmasi')->name('pinjam.update');
    Route::put('/data-alat/{id}', 'App\Http\Controllers\DataBarangController@updateKonfirmasi')->name('data-alat-update');
    Route::delete('/data-alat/delete/{id}', 'App\Http\Controllers\DataBarangController@delete')->name('data-alat.delete');
});
// END OF ADMIN


// MAHASISWA
Route::middleware(['auth', 'cekrole:mahasiswa'])->group(function () {
    Route::get('ListPinjam', 'App\Http\Controllers\ListPinjamController@index')->name('list-pinjam');
    Route::post('/simpan', 'App\Http\Controllers\pinjamController@store')->name('simpan');
    Route::get('/cart/{id}', [CartController::class, 'addtoCart'])->name('add.to.cart');
    Route::get('/cart', [CartController::class, 'dataalatCart'])->name('cart');
    Route::delete('/delete-cart', [CartController::class, 'deleteCart'])->name('delete.cart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('history-mahasiswa', 'App\Http\Controllers\pinjamController@index')->name('history-mahasiswa');
    Route::get('/about-mahasiswa', 'App\Http\Controllers\AboutController@index')->name('about-mahasiswa');
    Route::get('/dashboard-mahasiswa', 'App\Http\Controllers\DashboardMhsController@index')->name('dashboard-mahasiswa');
    Route::delete('/pinjam/delete/{id}', 'App\Http\Controllers\pinjamController@delete')->name('pinjam.delete');
});
// END OF MAHASISWA