<?php

use App\Models\HistoryDelete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPeminjam;
use App\Http\Controllers\AuthController;
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
Route::get('tambahalat', function () {

    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\TambahAlatController@create');
});

Route::get('DataPeminjam', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DataPeminjamController@index');
})->name('DataPeminjam');

Route::get('HistoryPeminjam', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\HistoryDeleteController@index');
})->name('HistoryPeminjam');

Route::get('/dashboard-admin', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DashboardController@index');
})->name('dasboard');


Route::get('/dashboard-admin', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DashboardController@index');
})->name('dasboard');

Route::post('tambahalat.store', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\TambahAlatController@store');
})->name('tambahalat.store');


Route::put('/pinjam/{id}', function ($id) {
    if (!Auth::check()) {
        return redirect('login');
    } elseif (Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DataPeminjamController@updateKonfirmasi', ['id' => $id]);
})->name('pinjam.update');



Route::put('/data-alat/{id}', function ($id) {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DataBarangController@updateKonfirmasi', ['id' => $id]);
})->name('data-alat-update');


Route::delete('/data-alat/delete/{id}', function ($id) {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'staff') {
        return redirect('data-alat');
    }

    return app()->call('App\Http\Controllers\DataBarangController@delete', ['id' => $id]);
})->name('data-alat.delete');
// END OF ADMIN


// MAHASISWA
Route::get('ListPinjam', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\ListPinjamController@index');
})->name('list-pinjam');


Route::post('/simpan', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\pinjamController@store');
})->name('simpan');

Route::get('history-mahasiswa', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\pinjamController@index');
})->name('history-mahasiswa');

Route::get('/about-mahasiswa', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\AboutController@index');
})->name('about-mahasiswa');


Route::get('/dashboard-mahasiswa', function () {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\DashboardMhsController@index');
})->name('dashboard-mahasiswa');


Route::delete('/pinjam/delete/{id}', function ($id) {
    
    if (!Auth::check()){
        return redirect('login');

    }elseif(Auth::user()->role !== 'mahasiswa') {
        return redirect('DataPeminjam');
    }

    return app()->call('App\Http\Controllers\pinjamController@delete', ['id' => $id]);
})->name('pinjam.delete');

// END OF MAHASISWA


    