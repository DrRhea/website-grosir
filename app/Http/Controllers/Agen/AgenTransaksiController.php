<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use App\Models\Grosir;
use App\Models\TelurExpired;
use Illuminate\Http\Request;

class AgenTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_telur_expired()
    {
        $telur_expired = TelurExpired::with('produk')->get();

        return view('agen.transaksi.telur-expired', compact('telur_expired'));
    }

    public function show_grosir()
    {
        $grosirs = Grosir::with('user')->get();

        return view('agen.transaksi.grosir', compact('grosirs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
