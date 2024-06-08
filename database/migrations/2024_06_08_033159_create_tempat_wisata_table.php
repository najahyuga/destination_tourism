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
        Schema::create('tempat_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('name_tw');
            $table->text('deskripsi');
            $table->string('image_tw');
            $table->unsignedBigInteger('daerah_wisata_id');
            $table->foreign('daerah_wisata_id')->references('id')->on('daerah_wisata')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('id_kategori')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_wisatas');
    }
};
