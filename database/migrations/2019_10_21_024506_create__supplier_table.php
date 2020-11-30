<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_supplier', function (Blueprint $table) {
            $table->string('kode_supplier', 15);
            $table->string('nama_supplier', 30);
            $table->string('alamat_supplier', 30);
            $table->string('kota_supplier', 30);
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
        Schema::dropIfExists('_supplier');
    }
}
