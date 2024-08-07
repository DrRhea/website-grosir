<?php

namespace App\Http\Controllers\Grosir;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class GrosirWishlistController extends Controller
{
  public function index() {
    $wishlists = Wishlist::all();

    return view('grosir.wishlist', compact('wishlists'));
  }

  public function add(Request $request)
  {
    WishList::create([
      'id_grosir' => $request->id_grosir,
      'id_produk' => $request->id_produk,
    ]);

    return redirect()->back();
  }

  public function remove(Request $request)
  {
    $wishlist = Wishlist::find($request->id);
    $wishlist->delete();

    return redirect()->back();
  }
}