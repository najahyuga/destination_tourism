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
        Schema::create('suka', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tempat_wisata_id');
            $table->foreign('tempat_wisata_id')->references('id')->on('tempat_wisata')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sukas');
    }
};
