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
        Schema::create('peminjaman_detail', function (Blueprint $table) {
            $table->increments('detail_id')->primary();
            $table->unsignedInteger('detail_buku_id')->nullable(false);
            $table->unsignedInteger('detail_peminjaman_id')->nullable(false);
            $table->integer('quantity')->nullable(false);
            
            
            $table->foreign('detail_buku_id')->references('buku_id')->on('buku')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('detail_peminjaman_id')->references('peminjaman_id')->on('peminjaman')
            ->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_detail');
    }
};
