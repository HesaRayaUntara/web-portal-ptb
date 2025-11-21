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
        if (Schema::hasTable('kurikulum')) {
            return;
        }
        
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->string('status_mata_kuliah');
            $table->integer('sks_kuliah')->default(0);
            $table->integer('sks_praktikum')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
