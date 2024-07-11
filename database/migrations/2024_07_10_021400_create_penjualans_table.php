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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()
            ->constrained('users', 'id')->cascadeOnUpdate()
            ->restrictOnDelete();
            $table->string('kode_transaksi')
            ->unique();
            $table->date('tanggal_transaksi');
            $table->double('total_harga');
            $table->double('nominal_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};