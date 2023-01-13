<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRinciPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rinci_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('noFakturJual');
            $table->foreignId('idToko');
            $table->foreignId('idPenjualan');
            $table->integer('total');
            $table->integer('totalItem');
            $table->date('tglJual');
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
        Schema::dropIfExists('rinci_penjualans');
    }
}
