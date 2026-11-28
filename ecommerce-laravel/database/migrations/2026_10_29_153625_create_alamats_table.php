<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')
                  ->constrained('pelanggans')
                  ->cascadeOnDelete();
            $table->string('tipe_alamat');
            $table->text('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alamats');
    }
};
