<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_barangmasuk', function (Blueprint $table) {
            $table->bigIncrements('id_brgmasuk');
            $table->string('kode_barang', 16);
            $table->date('tgl_masuk');
            $table->integer('jml_brg_masuk');
            $table->string('kode_supplier', 11);
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
        Schema::dropIfExists('_barangmasuk');
    }
}
