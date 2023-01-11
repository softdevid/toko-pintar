<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualan2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan2s', function (Blueprint $table) {
            $table->id();
            $table->string('noFakturJual');
            $table->foreignId('idToko');
            $table->foreignId('idProduk');
            $table->string('namaProduk');
            $table->integer('hargaJual');
            $table->integer('hargaBeli');
            $table->integer('jumlahJual');
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
        Schema::dropIfExists('penjualan2s');
    }
}
