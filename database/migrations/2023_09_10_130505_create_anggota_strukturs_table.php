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
        Schema::create('anggota_strukturs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('strukturs_id');
            $table->foreign('strukturs_id')->references('id')->on('strukturs')->onDelete('cascade');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jataban')->nullable();
            $table->text('tupoksi')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_strukturs');
    }
};
