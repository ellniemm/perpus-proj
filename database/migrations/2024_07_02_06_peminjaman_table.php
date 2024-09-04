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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('peminjaman_id')->primary();
            $table->unsignedInteger('peminjaman_user_id')->nullable(false);
            $table->boolean('peminjaman_status')->nullable(false);
            $table->string('peminjaman_notes')->nullable(false);
            
            $table->foreign('peminjaman_user_id')->references('user_id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
