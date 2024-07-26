<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrosirRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('authentication.register-grosir');
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
      $validatedData = $request->validate([
        'username' => 'required|unique:users|max:255',
        'password' => 'required|confirmed|min:8',
      ], [
        'username.required' => 'Nama pengguna wajib diisi.',
        'username.unique' => 'Nama pengguna sudah ada.',
        'username.max' => 'Nama pengguna harus tidak boleh lebih dari 255 karakter.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        'password.min' => 'Kata sandi harus terdiri dari minimal 8 karakter.',
      ]);

      $user = User::create ([
          'username' => $validatedData['username'],
          'password' => bcrypt($validatedData['password']),
        ]);

      Auth::login($user);

      return redirect()->route('grosir.form');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
