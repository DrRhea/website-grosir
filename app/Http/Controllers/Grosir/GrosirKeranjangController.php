<?php

namespace App\Http\Controllers\Grosir;

use App\Http\Controllers\Controller;
use App\Models\Grosir;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrosirKeranjangController extends Controller
{
  public function index() {
    $grosir = Grosir::where('id_user', Auth::id())->first();
    $keranjangs = Keranjang::where('id_grosir', $grosir->id)->get();

    return view('grosir.keranjang', compact('grosir', 'keranjangs'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'qty' => 'required|numeric|min:1',
    ], [
      'qty.required' => 'Jumlah tidak boleh kosong',
      'qty.min' => 'Jumlah tidak boleh kurang dari 1',
    ]);

    $user = Auth::user();
    $grosir = Grosir::where('id_user', $user->id)->first();

    if (!$grosir) {
      return redirect()->back()->withErrors(['msg' => 'Grosir tidak ditemukan.']);
    }

    $id_produk = $request->input('id_produk');
    $qtyToAdd = $request->input('qty');

    $keranjang = Keranjang::where('id_grosir', $grosir->id)
      ->where('id_produk', $id_produk)
      ->first();

    if ($keranjang) {
      $keranjang->qty += $qtyToAdd;
      $keranjang->save();
    } else {
      Keranjang::create([
        'id_grosir' => $grosir->id,
        'id_produk' => $id_produk,
        'qty'       => $qtyToAdd,
      ]);
    }

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
  }
}
