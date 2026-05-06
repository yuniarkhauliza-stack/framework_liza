<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->year('angkatan');
            $table->enum('tujuan', ['Dosen', 'Fasilitas', 'Program Studi', 'Lainnya']);
            $table->text('isi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};