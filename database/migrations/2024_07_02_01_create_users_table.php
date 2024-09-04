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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->primary();
            $table->string('user_nama', 50)->nullable(false);
            $table->string('user_alamat', 50)->nullable(false);
            $table->string('user_username', 50)->nullable(false);
            $table->string('user_email', 50)->nullable(false);
            $table->string('user_notelp', 13)->nullable(false);
            $table->string('user_password')->nullable(false);
            $table->enum('user_level', ['admin','siswa'])->nullable(false)->default('siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
