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
        Schema::create('rak', function (Blueprint $table) {
            $table->increments('rak_id')->primary();
            $table->string('rak_nama', 20)->nullable(false);
            $table->string('rak_lokasi', 50)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rak');
    }
};
