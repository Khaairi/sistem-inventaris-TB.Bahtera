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
        Schema::create('laporan_penjualan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('harga_barang');
            $table->integer('banyak_barang');
            $table->integer('total_harga');
            $table->integer('keuntungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan_details');
    }
};
