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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('image')->nullable();
            $table->string('nama_barang');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_jual');
            $table->integer('stok');
            $table->integer('batas_stok');
            $table->foreignId('kategori_id');
            $table->string('satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
