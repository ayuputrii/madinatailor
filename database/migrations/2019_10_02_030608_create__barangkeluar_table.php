<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_barangkeluar', function (Blueprint $table) {
            $table->bigIncrements('id_brgkeluar');
            $table->string('kode_barang', 16);
            $table->date('tgl_keluar');
            $table->string('penerima', 30);
            $table->integer('jml_brg_keluar');
            $table->string('keperluan', 30);
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
        Schema::dropIfExists('_barangkeluar');
    }
}
