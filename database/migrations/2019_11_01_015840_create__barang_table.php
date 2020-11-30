<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_barang', function (Blueprint $table) {
            $table->string('kode_barang', 30);
            $table->string('nama_barang', 30);
            $table->string('spesifikasi', 30);
            $table->string('kode_lokasi', 30);
            $table->string('kode_kategori', 30);
            $table->string('jml_barang', 30);
            $table->string('kondisi', 30);
            $table->string('jenis_barang', 30);
            $table->string('sumber_dana', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_barang');
    }
}
