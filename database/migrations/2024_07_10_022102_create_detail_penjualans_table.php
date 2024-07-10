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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penjualan')
            ->nullable()
            ->constrained('penjualans','id')
            ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_barang')
            ->nullable()
            ->constrained('barangs','id')
            ->cascadeOnUpdate()->nullOnDelete();
            $table->integer('jumlah');
            $table->integer('qty');
            $table->double('harga');
            $table->double('total_harga');
            $table->double('nominal_bayar');
            $table->double('kembalian');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};