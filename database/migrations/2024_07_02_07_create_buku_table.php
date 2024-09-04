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
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('buku_id')->primary();
            $table->unsignedInteger('buku_kategori_id');
            $table->unsignedInteger('buku_penerbit_id');
            $table->unsignedInteger('buku_rak_id');
            $table->unsignedInteger('buku_penulis_id');
            $table->string('buku_nama',255)->nullable(false);
            $table->char('buku_isbn',16)->nullable(false);
            $table->integer('buku_stok')->nullable(false);
            $table->string('buku_deskripsi',255)->nullable(false);
            $table->string('buku_img',255)->nullable(false);

            //foreign
            $table->foreign('buku_kategori_id')->references('kategori_id')->on('kategori')->onDelete('cascade');
            $table->foreign('buku_penerbit_id')->references('penerbit_id')->on('penerbit')->onDelete('cascade');
            $table->foreign('buku_rak_id')->references('rak_id')->on('rak')->onDelete('cascade');
            $table->foreign('buku_penulis_id')->references('penulis_id')->on('penulis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};