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
        Schema::create('profil_lulusan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_prodi_id')->constrained('profil_prodi')->onDelete('cascade');
            $table->string('peran');
            $table->text('deskripsi_kemampuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_lulusan');
    }
};
