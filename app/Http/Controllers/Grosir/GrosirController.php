<?php

namespace App\Http\Controllers\Grosir;

use App\Http\Controllers\Controller;
use App\Models\Grosir;
use Illuminate\Http\Request;

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
