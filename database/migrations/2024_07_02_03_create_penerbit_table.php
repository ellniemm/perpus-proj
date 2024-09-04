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
        Schema::create('penerbit', function (Blueprint $table) {
            $table->increments('penerbit_id')->primary();
            $table->string('penerbit_nama', 50)->nullable(false);
            $table->string('penerbit_desc', 150)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbit');
    }
};
