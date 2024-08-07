<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('distribusis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk')->constrained('produks');
            $table->foreignId('id_grosir')->constrained('grosirs');
            $table->integer('qty');
            $table->date('tanggal_pengiriman');
            $table->longText('keterangan_pengiriman')->nullable();
            $table->enum('jenis_pengiriman', ['darurat', 'reguler'])->default('reguler');
            $table->enum('status_pengiriman', ['diproses', 'dalam perjalanan', 'diterima'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusis');
    }
};
