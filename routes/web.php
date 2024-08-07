<?php

  use App\Http\Controllers\Agen\AgenController;
  use App\Http\Controllers\Agen\AgenProdukController;
  use App\Http\Controllers\Agen\AgenTransaksiController;
  use App\Http\Controllers\Auth\AgenLoginController;
  use App\Http\Controllers\Auth\GrosirLoginController;
  use App\Http\Controllers\Auth\GrosirRegisterController;
  use App\Http\Controllers\Grosir\GrosirController;
  use App\Http\Controllers\Grosir\GrosirProdukController;
  use App\Http\Controllers\Grosir\GrosirProfileController;
  use App\Http\Controllers\Grosir\GrosirTentangKamiController;
  use App\Http\Controllers\Grosir\GrosirWishlistController;
  use App\Http\Controllers\GrosirBeliSekarangController;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Route;

  Route::middleware(['auth', 'x'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
  });

  Route::middleware('guest')->group(function () {
  Route::get('/agen/masuk', [AgenLoginController::class, 'index'])->name('agen.login');
  Route::post('/agen/masuk', [AgenLoginController::class, 'login']);

  Route::get('/grosir/masuk', [GrosirLoginController::class, 'index'])->name('grosir.login');
  Route::post('/grosir/masuk', [GrosirLoginController::class, 'login']);

  Route::get('/grosir/daftar', [GrosirRegisterController::class, 'index'])->name('grosir.register');
  Route::post('/grosir/daftar', [GrosirRegisterController::class, 'store']);
});

  Route::post('/logout', function () {
    Auth::logout();
    return redirect('/agen/masuk');
  })->name('logout');

  Route::middleware(['auth', 'agen'])->prefix('agen')->group(function () {

    Route::get('/', [AgenController::class, 'index'])->name('agen.index');

    Route::get('/profil', [AgenController::class, 'profil'])->name('agen.profil');
    Route::put('/profil', [AgenController::class, 'profil_update']);

    Route::get('/produk', [AgenProdukController::class, 'index'])->name('agen.produk');
    Route::get('/produk/tambah', [AgenProdukController::class, 'create'])->name('agen.produk.tambah');
    Route::post('/produk/tambah', [AgenProdukController::class, 'store']);

    Route::get('/produk/edit/{produk}', [AgenProdukController::class, 'edit'])->name('agen.produk.edit');
    Route::put('/produk/edit', [AgenProdukController::class, 'update']);

    Route::get('/transaksi/telur-expired', [AgenTransaksiController::class, 'show_telur_expired'])->name('agen.produk.expired');
    Route::get('/transaksi/grosir', [AgenTransaksiController::class, 'show_grosir'])->name('agen.grosir');

  });

Route::middleware(['auth', 'grosir'])->prefix('grosir')->group(function () {

  Route::get('/', [GrosirController::class, 'index'])->name('grosir.index');
  Route::get('/produk', [GrosirProdukController::class, 'index'])->name('grosir.produk.index');
  Route::get('/produk/detail/{nama_produk}', [GrosirProdukController::class, 'show'])->name('grosir.produk.show');
  Route::get('/produk/beli-sekarang/{nama_produk}', [GrosirBeliSekarangController::class, 'index'])->name('grosir.produk.beli-sekarang');
  Route::get('/tentang', [GrosirTentangKamiController::class, 'index'])->name('grosir.tentang.index');


  Route::post('/produk/wishlist/add', [GrosirWishlistController::class, 'add'])->name('grosir.produk.wishlist.add');
  Route::delete('/produk/wishlist/remove', [GrosirWishlistController::class, 'remove'])->name('grosir.produk.wishlist.remove');

  Route::get('/form', [GrosirController::class, 'form'])->name('grosir.form');
  Route::post('/form', [GrosirController::class, 'store']);

  Route::get('/profil', [GrosirProfileController::class, 'index'])->name('grosir.profile');
  Route::put('/profil', [GrosirProfileController::class, 'update'])->name('grosir.profile.update');
});
