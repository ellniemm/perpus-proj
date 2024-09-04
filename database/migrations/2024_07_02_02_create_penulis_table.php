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
        Schema::create('penulis', function (Blueprint $table) {
            $table->increments('penulis_id')->primary();
            $table->string('penulis_nama', 50)->nullable(false);
            $table->string('penulis_desc', 150)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penulis');
    }
};
