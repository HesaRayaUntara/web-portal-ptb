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
        if (Schema::hasTable('deskripsi_kurikulum')) {
            return;
        }
        
        Schema::create('deskripsi_kurikulum', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi_semester_1_2')->nullable();
            $table->text('deskripsi_semester_3_4')->nullable();
            $table->text('deskripsi_semester_5_6')->nullable();
            $table->text('deskripsi_semester_7_8')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deskripsi_kurikulum');
    }
};
