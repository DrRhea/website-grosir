<?php

namespace App\Http\Controllers\Grosir;

use App\Models\Grosir;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrosirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function form()
    {

      return view('grosir.form-grosir');
    }
    
    public function home()
    {
        $produks = Produk::all(); // Mengambil semua produk dari database
        return view('home-grosir', compact('produks')); // Mengirim data produk ke view
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Grosir $grosir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grosir $grosir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grosir $grosir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grosir $grosir)
    {
        //
    }
}
