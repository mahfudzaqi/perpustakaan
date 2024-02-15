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
        Schema::create('buku', function (Blueprint $table) {
            // Menggunakan id() untuk membuat kolom idBuku sebagai primary key dengan auto-increment
            $table->id('idBuku');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahunterbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
