<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduk2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser');
            $table->foreignId('idKategori');
            $table->foreignId('idSatuan');
            $table->foreignId('idToko');
            $table->string('namaProduk');
            $table->integer('hargaJual');
            $table->integer('hargaBeli');
            $table->integer('stokToko');
            $table->integer('stokGudang');
            $table->integer('terjual')->default(0);
            $table->text('deskripsi');
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
        Schema::dropIfExists('produk2s');
    }
}
