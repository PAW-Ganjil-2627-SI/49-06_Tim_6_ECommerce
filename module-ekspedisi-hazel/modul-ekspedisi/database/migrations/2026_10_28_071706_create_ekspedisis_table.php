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
    Schema::create('ekspedisis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kurir');
        $table->string('layanan');
        $table->string('zonasi');
        $table->string('estimasi')->nullable()->default('1-3 Hari');
        $table->string('tarif')->nullable()->default('Rp 10.000');
        $table->string('status')->default('Aktif');
        $table->text('keterangan')->nullable()->default('Pengiriman reguler/express sesuai zona');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekspedisis');
    }
};
