<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agen.dashboard');
    }

    public function profil()
    {
        $agen = Agen::where('id_user', Auth::user()->id)->first();

        return view('agen.profil', compact('agen'));
    }

    public function profil_update(Request $request)
    {
      // Validasi input form
      $request->validate([
        'nama_agen' => 'required|string|max:255',
        'alamat_agen' => 'required|string|max:255',
        'nomor_telefon_agen' => 'required|string|max:20',
        'foto_agen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika Anda ingin mengizinkan upload gambar
      ], [
        'required' => ':attribute wajib diisi.',
        'string' => ':attribute harus berupa teks.',
        'max' => ':attribute tidak boleh lebih dari :max karakter.',
        'image' => ':attribute harus berupa file gambar.',
        'mimes' => ':attribute harus memiliki format file: :values.',
        'max' => ':attribute tidak boleh lebih dari :max KB.',
      ]);

      // Mengupdate data agen berdasarkan input dari form
      $input = [
        'nama_agen' => $request->nama_agen,
        'alamat_agen' => $request->alamat_agen,
        'nomor_telefon_agen' => $request->nomor_telefon_agen,
      ];

      // Mengelola upload foto profil agen jika ada
      if ($request->hasFile('foto_agen')) {
        $file = $request->file('foto_agen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/profile/agen'), $filename); // Pindahkan file ke direktori public/img/profile/agen
        $input['foto_agen'] = $filename; // Simpan nama file ke dalam input array
      }

      // Mengambil data agen yang akan diupdate
      $agen = Agen::where('id_user', Auth::user()->id)->first();

      // Update data agen berdasarkan input
      $agen->update($input);

      // Redirect atau tampilkan halaman profil agen setelah update
      return redirect('/agen/profil')->with('success', 'Profil berhasil diperbarui.');
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
    public function show(Agen $agen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agen $agen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agen $agen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agen $agen)
    {
        //
    }
}
