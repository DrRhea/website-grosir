<?php

namespace App\Http\Controllers;

use App\Models\Grosir;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class GrosirTransaksiController extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $grosir = Grosir::where('id_user', $user->id)->first();

    if ($grosir) {
      $transaksi = Transaksi::where('id_grosir', $grosir->id)->get();
    } else {
      $transaksi = collect();
    }

    return view('grosir.pesanan', compact('grosir', 'transaksi'));
  }

  public function store(Request $request) {

    // Validasi input
    $validated = $request->validate([
      'id_grosir' => 'required|exists:grosirs,id',
      'id_produk' => 'required|exists:produks,id',
      'qty' => 'required|numeric|min:1',
      'bukti_pembayaran' => 'required|file|mimes:jpeg,png,pdf|max:2048',
      'jenis_pengiriman' => 'required|in:reguler,darurat',
    ], [
      'id_grosir.required' => 'Grosir harus dipilih.',
      'id_grosir.exists' => 'Grosir yang dipilih tidak valid.',
      'id_produk.required' => 'Produk harus dipilih.',
      'id_produk.exists' => 'Produk yang dipilih tidak valid.',
      'qty.required' => 'Jumlah (qty) wajib diisi.',
      'qty.numeric' => 'Jumlah (qty) harus berupa angka.',
      'qty.min' => 'Jumlah (qty) minimal adalah 1.',
      'bukti_pembayaran.required' => 'Bukti pembayaran wajib diunggah.',
      'bukti_pembayaran.file' => 'File bukti pembayaran tidak valid.',
      'bukti_pembayaran.mimes' => 'Bukti pembayaran harus berupa file dengan format: jpeg, png, atau pdf.',
      'bukti_pembayaran.max' => 'Ukuran file bukti pembayaran tidak boleh lebih dari 2MB.',
      'jenis_pengiriman.required' => 'Jenis pengiriman wajib dipilih.',
      'jenis_pengiriman.in' => 'Jenis pengiriman harus salah satu dari: reguler, darurat.',
    ]);

    // Menyimpan file ke dalam folder public/img/upload/bukti_pembayaran
    if ($request->hasFile('bukti_pembayaran')) {
      $file = $request->file('bukti_pembayaran');
      $filename = time() . '_' . $file->getClientOriginalName(); // Membuat nama file unik
      $file->move(public_path('upload/bukti_pembayaran'), $filename); // Menyimpan file
    }

    // Generate nomor faktur otomatis
    $date = date('Ymd'); // Tanggal saat ini dalam format YYYYMMDD
    $lastInvoice = Transaksi::whereDate('created_at', date('Y-m-d'))->orderBy('id', 'desc')->first();
    $nextInvoiceNumber = $lastInvoice ? ((int)substr($lastInvoice->no_faktur, -4)) + 1 : 1;
    $noFaktur = 'INV-' . $date . '-' . str_pad($nextInvoiceNumber, 4, '0', STR_PAD_LEFT);

    // Hitung ongkos kirim
    $ongkosKirim = ($request->input('jenis_pengiriman') == 'darurat') ? 50000 : 20000;

    // Ambil harga produk
    $hargaProduk = Produk::find($request->input('id_produk'))->harga_produk;

    // Hitung total harga
    $totalHarga = $ongkosKirim + ($validated['qty'] * $hargaProduk);

    // Menyimpan data transaksi ke database
    Transaksi::create([
      'id_grosir' => $validated['id_grosir'],
      'id_produk' => $validated['id_produk'],
      'no_faktur' => $noFaktur, // Nomor faktur yang dihasilkan otomatis
      'qty' => $validated['qty'],
      'total_harga' => $totalHarga,
      'bukti_pembayaran' => $filename, // Simpan nama file yang sudah diupload
      'jenis_pengiriman' => $validated['jenis_pengiriman'],
      'status' => 'pending', // Status default
    ]);

    return redirect()->back();
  }

}
