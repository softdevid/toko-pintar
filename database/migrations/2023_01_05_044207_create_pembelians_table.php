<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('noFakturBeli');
            $table->foreignId('idUser');
            $table->foreignId('idToko');
            $table->foreignId('idProduk');
            $table->string('barcode');
            $table->string('namaProduk');
            $table->integer('hargaJual');
            $table->integer('hargaBeli');
            $table->integer('jumlahBeli');
            $table->date('tglBeli');
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
        Schema::dropIfExists('pembelians');
    }
}
