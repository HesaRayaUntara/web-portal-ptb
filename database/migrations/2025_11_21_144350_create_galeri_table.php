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
        Schema::create('galeri', function (Blueprint $table) {
            $table->id('id_galeri');
            $table->string('judul');
            $table->text('deskripsi');
            $table->unsignedBigInteger('kategori_galeri_id');
            $table->foreign('kategori_galeri_id')->references('id_kategori_galeri')->on('kategori_galeri')->onDelete('cascade');
            $table->enum('tipe', ['photo', 'video']);
            $table->string('foto')->nullable();
            $table->string('youtube_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
