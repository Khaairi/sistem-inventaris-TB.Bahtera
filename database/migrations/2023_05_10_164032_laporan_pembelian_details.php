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
        Schema::create('laporan_pembelian_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('harga_beli');
            $table->integer('banyak_barang');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pembelian_details');
    }
};
