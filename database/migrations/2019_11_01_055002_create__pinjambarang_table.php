<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjambarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_pinjambarang', function (Blueprint $table) {
            $table->bigIncrements('no_pinjam');
            $table->date('tgl_pinjam');
            $table->string('kode_barang', 20);
            $table->integer('jml_pinjaman');
            $table->string('peminjaman', 30);
            $table->date('tgl_kembali');
            $table->string('keterangan', 30);
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
        Schema::dropIfExists('_pinjambarang');
    }
}
