<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_stok', function (Blueprint $table) {
            $table->bigIncrements('id_stok');
            $table->string('kode_barang', 16);
            $table->string('id_brgkeluar', 20);
            $table->string('id_brgmasuk', 20);
            $table->string('total_barang', 30);
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
        Schema::dropIfExists('_stok');
    }
}
