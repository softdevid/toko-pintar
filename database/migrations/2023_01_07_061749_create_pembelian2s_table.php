<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelian2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian2s', function (Blueprint $table) {
            $table->id();
            $table->string('noFakturBeli');
            $table->foreignId('idUser');
            $table->foreignId('idToko');
            $table->foreignId('idProduk');
            $table->string('namaProduk');
            $table->integer('hargaJual');
            $table->integer('hargaBeli');
            $table->integer('jumlahBeli');
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
        Schema::dropIfExists('pembelian2s');
    }
}
