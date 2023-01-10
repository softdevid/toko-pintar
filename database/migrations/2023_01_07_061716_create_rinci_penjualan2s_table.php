<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRinciPenjualan2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rinci_penjualan2s', function (Blueprint $table) {
            $table->id();
            $table->string('noFakturJual');
            $table->foreignId('idToko');
            $table->foreignId('idPenjualan');
            $table->integer('total');
            $table->integer('totalItem');
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
        Schema::dropIfExists('rinci_penjualan2s');
    }
}
