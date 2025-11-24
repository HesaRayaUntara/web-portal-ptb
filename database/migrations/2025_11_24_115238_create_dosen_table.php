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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->enum('status', ['dosen tetap', 'dosen tidak tetap'])->default('dosen tetap');
            $table->text('bidang_keahlian')->nullable();
            $table->text('pendidikan')->nullable();
            $table->string('email')->nullable();
            $table->string('gsch')->nullable(); // Link Google Scholar
            $table->boolean('kepala_program_studi')->nullable()->default(null);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
