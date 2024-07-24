<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
      'id_agen',
      'nama_produk',
      'deskripsi_produk',
      'harga_produk',
      'stok_produk',
      'foto_produk',
    ];
}
