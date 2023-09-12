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
        Schema::create('inv_desas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apb_id');
            $table->foreign('apb_id')->references('id')->on('apb_desas')->onDelete('cascade');
            $table->string('nama');
            $table->string('kode');
            $table->string('nup');
            $table->string('merek');
            $table->string('tahun');
            $table->timestamps();
            $table->softDeletes();

            // Tidak perlu unique constraint karena ini adalah relasi "one to many"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_desas');
    }
};
