<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRinciPembelian2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rinci_pembelian2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idToko');
            $table->foreignId('idPembelian');
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
        Schema::dropIfExists('rinci_pembelian2s');
    }
}
