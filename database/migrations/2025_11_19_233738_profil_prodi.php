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
        Schema::create('profil_prodi', function (Blueprint $table) {
            $table->id('id_profil_prodi');
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('tujuan')->nullable();
            $table->string('lama_studi')->nullable();
            $table->string('gelar_lulusan')->nullable();
            $table->string('kepanjangan_gelar')->nullable();
            $table->integer('snbp_pelamar')->nullable();
            $table->integer('snbp_diterima')->nullable();
            $table->decimal('snbp_keketatan', 10, 2)->nullable();
            $table->integer('snbt_pelamar')->nullable();
            $table->integer('snbt_diterima')->nullable();
            $table->decimal('snbt_keketatan', 10, 2)->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('foto_akreditasi')->nullable();
            $table->text('industri_tempat_bekerja')->nullable();
            $table->json('mitra_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_prodi');
    }
};
