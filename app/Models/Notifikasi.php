<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
      'id_produk',
      'pesan_notifikasi',
      'tanggal_notifikasi'
    ];
}
