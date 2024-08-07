<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Produk;
use App\Models\TelurExpired;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AgenProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();

        return view('agen.produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agen.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->merge(['nama_produk' => strtolower($request->nama_produk)]);

      $validatedData = $request->validate([
        'nama_produk' => 'required|string|unique:produks|max:255',
        'deskripsi_produk' => 'required|string',
        'harga_produk' => 'required|numeric|min:0',
        'stok_produk' => 'required|integer|min:0',
        'rop_produk' => 'required|integer|min:0',
        'lead_time_produk' => 'required|integer|min:0',
        'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB untuk gambar,
        'tanggal_kedaluwarsa' => 'required|integer|min:0',
      ], [
        'nama_produk.required' => 'Nama produk harus diisi.',
        'nama_produk.string' => 'Nama produk harus berupa teks.',
        'nama_produk.unique' => 'Nama produk sudah ada.',
        'nama_produk.max' => 'Nama produk tidak boleh lebih dari :max karakter.',
        'deskripsi_produk.required' => 'Deskripsi produk harus diisi.',
        'deskripsi_produk.string' => 'Deskripsi produk harus berupa teks.',
        'harga_produk.required' => 'Harga produk harus diisi.',
        'harga_produk.numeric' => 'Harga produk harus berupa angka.',
        'harga_produk.min' => 'Harga produk harus bernilai minimal :min.',
        'stok_produk.required' => 'Stok produk harus diisi.',
        'stok_produk.integer' => 'Stok produk harus berupa bilangan bulat.',
        'stok_produk.min' => 'Stok produk harus bernilai minimal :min.',
        'rop_produk.required' => 'ROP harus diisi.',
        'rop_produk.integer' => 'ROP harus berupa bilangan bulat.',
        'rop_produk.min' => 'ROP harus bernilai minimal :min.',
        'lead_time_produk.required' => 'Lead Time harus diisi.',
        'lead_time_produk.integer' => 'Lead Time harus berupa bilangan bulat.',
        'lead_time_produk.min' => 'Lead Time harus bernilai minimal :min.',
        'foto_produk.required' => 'Foto produk harus diunggah.',
        'foto_produk.image' => 'File yang diunggah harus berupa gambar.',
        'foto_produk.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, atau gif.',
        'foto_produk.max' => 'Ukuran gambar tidak boleh lebih dari :max kilobita.',
        'tanggal_kedaluwarsa.required' => 'Tanggal Kedaluwarsa harus diisi.',
        'tanggal_kedaluwarsa.integer' => 'Tanggal Kedaluwarsa harus berupa bilangan bulat.',
        'tanggal_kedaluwarsa.min' => 'Tanggal Kedaluwarsa harus bernilai minimal :min.',
      ]);

      // Setelah validasi berhasil, lanjutkan dengan menyimpan data ke database atau melakukan proses lainnya.
      $nama_foto = time() . '_' . $request->file('foto_produk')->getClientOriginalName();
      $lokasi_foto = public_path('/upload/foto_produk');
      $request->file('foto_produk')->move($lokasi_foto, $nama_foto);

      $idAgen = Agen::where('id_user', $request->id_user)->first();

      $produk = Produk::create([
        'id_agen' => $idAgen->id,
        'nama_produk' => strtolower($validatedData['nama_produk']),
        'deskripsi_produk' => $validatedData['deskripsi_produk'],
        'harga_produk' => $validatedData['harga_produk'],
        'stok_produk' => $validatedData['stok_produk'],
        'stok_realtime_produk' => $validatedData['stok_produk'],
        'rop_produk' => $validatedData['rop_produk'],
        'lead_time_produk' => $validatedData['lead_time_produk'],
        'foto_produk' => '/upload/foto_produk/' . $nama_foto,
      ]);

      // Ambil tanggal saat ini
      $tanggalSekarang = Carbon::now()->toDateString();

      // Hitung tanggal expired 30 hari dari sekarang
      $tanggalExpired = Carbon::now()->addDays(intval($validatedData['tanggal_kedaluwarsa']))->toDateString();

      $telurExpired = TelurExpired::create([
        'id_produk' => $produk->id,
        'stok_masuk' => $validatedData['stok_produk'],
        'tanggal_restok' => $tanggalSekarang,
        'tanggal_kedaluwarsa' => $tanggalExpired,
      ]);

      // Jika ingin kembalikan respons atau redirect setelah berhasil disimpan
      return redirect()->route('agen.produk')->with('success', 'Produk berhasil ditambahkan.');
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
    public function edit(string $produk)
    {

      $slug = Str::of($produk)->replace('-', ' ');

      $produks = Produk::where('nama_produk', $slug)->first();

      $telurExpired = TelurExpired::where('id_produk', $produks->id)->first();

      $tanggalKedaluwarsa = Carbon::parse($telurExpired->tanggal_kedaluwarsa);
      $tanggalRestock = Carbon::parse($telurExpired->tanggal_restock);

      $selisihHari = intval($tanggalRestock->diffInDays($tanggalKedaluwarsa)) + 1;

      return view('agen.produk.edit', compact('produks', 'selisihHari', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $request->merge(['nama_produk' => strtolower($request->nama_produk)]);

      $validatedData = $request->validate([
        'nama_produk' => 'required|string|unique:produks,nama_produk,' . $request->id . '|max:255',
        'deskripsi_produk' => 'required|string',
        'harga_produk' => 'required|numeric|min:0',
        'stok_produk' => 'required|integer|min:0',
        'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB untuk gambar
      ], [
        'nama_produk.required' => 'Nama produk harus diisi.',
        'nama_produk.string' => 'Nama produk harus berupa teks.',
        'nama_produk.unique' => 'Nama produk sudah ada.',
        'nama_produk.max' => 'Nama produk tidak boleh lebih dari :max karakter.',
        'deskripsi_produk.required' => 'Deskripsi produk harus diisi.',
        'deskripsi_produk.string' => 'Deskripsi produk harus berupa teks.',
        'harga_produk.required' => 'Harga produk harus diisi.',
        'harga_produk.numeric' => 'Harga produk harus berupa angka.',
        'harga_produk.min' => 'Harga produk harus bernilai minimal :min.',
        'stok_produk.required' => 'Stok produk harus diisi.',
        'stok_produk.integer' => 'Stok produk harus berupa bilangan bulat.',
        'stok_produk.min' => 'Stok produk harus bernilai minimal :min.',
        'foto_produk.image' => 'File yang diunggah harus berupa gambar.',
        'foto_produk.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, atau gif.',
        'foto_produk.max' => 'Ukuran gambar tidak boleh lebih dari :max kilobita.',
      ]);

      // Temukan produk berdasarkan ID
      $produk = Produk::find($request->id);

      // Jika ada foto baru yang diunggah, proses unggahannya
      if ($request->hasFile('foto_produk')) {
        $nama_foto = time() . '_' . $request->file('foto_produk')->getClientOriginalName();
        $lokasi_foto = public_path('/upload/foto_produk');
        $request->file('foto_produk')->move($lokasi_foto, $nama_foto);

        // Perbarui data produk termasuk foto
        $produk->update([
          'nama_produk' => strtolower($validatedData['nama_produk']),
          'deskripsi_produk' => $validatedData['deskripsi_produk'],
          'harga_produk' => $validatedData['harga_produk'],
          'stok_produk' => $validatedData['stok_produk'],
          'foto_produk' => '/upload/foto_produk/' . $nama_foto,
        ]);
      } else {
        // Perbarui data produk tanpa foto
        $produk->update([
          'nama_produk' => strtolower($validatedData['nama_produk']),
          'deskripsi_produk' => $validatedData['deskripsi_produk'],
          'harga_produk' => $validatedData['harga_produk'],
          'stok_produk' => $validatedData['stok_produk'],
        ]);
      }

      $telurExpired = TelurExpired::where('id_produk', $produk->id)->first();

      // Perbarui atau buat entri TelurExpired
      $telurExpired = TelurExpired::updateOrCreate(
        ['id' => $telurExpired->id],
        [
          'stok_masuk' => $validatedData['stok_produk'],
        ]
      );

      // Jika ingin kembalikan respons atau redirect setelah berhasil disimpan
      return redirect()->route('agen.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
