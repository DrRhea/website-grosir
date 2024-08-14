<?php

namespace App\Http\Controllers;

use App\Models\Grosir;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GrosirBeliSekarangController extends Controller
{
    public function index($nama_produk) {
      $grosir = Grosir::where('id_user', Auth::id())->first();

      $slug = Str::of($nama_produk)->replace('-', ' ');
      $produk = Produk::where('nama_produk', $slug)->first();

      return view('grosir.transaction.buy-now', compact('grosir', 'produk'));
    }
}
