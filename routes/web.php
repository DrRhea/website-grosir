<?php

use App\Http\Controllers\Agen\AgenController;
use App\Http\Controllers\Agen\AgenProdukController;
use App\Http\Controllers\Auth\AgenLoginController;
use App\Http\Controllers\Auth\GrosirLoginController;
use App\Http\Controllers\Auth\GrosirRegisterController;
use App\Http\Controllers\Grosir\GrosirController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

// Rute untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/agen/masuk', [AgenLoginController::class, 'index'])->name('login');
    Route::post('/agen/masuk', [AgenLoginController::class, 'login']);

    Route::get('/grosir/masuk', [GrosirLoginController::class, 'index'])->name('grosir.login');
    Route::post('/grosir/masuk', [GrosirLoginController::class, 'login']);

    Route::get('/grosir/daftar', [GrosirRegisterController::class, 'index'])->name('grosir.register');
    Route::post('/grosir/daftar', [GrosirRegisterController::class, 'store']);
});

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/agen/masuk');
})->name('logout');

// Rute untuk pengguna agen yang sudah login
Route::middleware(['auth', 'agen'])->group(function () {
    Route::get('/agen', [AgenController::class, 'index'])->name('agen.index');

    Route::get('/agen/profil', [AgenController::class, 'profil'])->name('agen.profil');
    Route::put('/agen/profil', [AgenController::class, 'profil_update']);

    Route::get('/agen/produk', [AgenProdukController::class, 'index'])->name('agen.produk');
    Route::get('agen/produk/tambah', [AgenProdukController::class, 'create'])->name('agen.produk.tambah');
    Route::post('agen/produk/tambah', [AgenProdukController::class, 'store']);

    Route::get('/agen/produk/edit/{produk}', [AgenProdukController::class, 'edit'])->name('agen.produk.edit');
    Route::put('/agen/produk/edit', [AgenProdukController::class, 'update']);
});

// Rute untuk pengguna grosir yang sudah login
Route::middleware(['auth', 'grosir'])->group(function () {
    Route::get('/grosir/form-grosir', [GrosirController::class, 'form'])->name('grosir.form');
    Route::post('/grosir/form-grosir', [GrosirController::class, 'store']);

    
    Route::get('/', [GrosirController::class, 'home'])->name('home-grosir');
});
