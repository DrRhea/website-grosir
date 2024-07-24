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

  Route::middleware('guest')->group(function () {
  Route::get('/agen/masuk', [AgenLoginController::class, 'index'])->name('agen.login');
  Route::post('/agen/masuk', [AgenLoginController::class, 'login']);

  Route::get('/grosir/masuk', [GrosirLoginController::class, 'index'])->name('grosir.login');
  Route::post('/grosir/masuk', [GrosirLoginController::class, 'index'])->name('grosir.login');

  Route::get('/grosir/daftar', [GrosirRegisterController::class, 'index'])->name('grosir.register');
  Route::post('/grosir/daftar', [GrosirRegisterController::class, 'store']);
});



Route::post('/logout', function () {
  Auth::logout();
  return redirect('/agen/masuk');
})->name('logout');

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

Route::middleware(['auth', 'grosir'])->group(function () {

  Route::get('/grosir/form', [GrosirController::class, 'form'])->name('grosir.form')->middleware('auth');
  Route::post('/grosir/form', [GrosirController::class, 'store'])->middleware('auth');

});
