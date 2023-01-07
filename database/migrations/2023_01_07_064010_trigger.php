<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Trigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //update stok toko ketika ada penjualan
        DB::unprepared(
            'CREATE TRIGGER `updateStokToko` AFTER INSERT ON `penjualans`
               FOR EACH ROW BEGIN
                  UPDATE produks set stokToko = stokToko - NEW.jumlahJual where id = NEW.idProduk;
              END'
        );

        //update jumlah terjual jika ada penjualan
        DB::unprepared(
            'CREATE TRIGGER `updateTerjual` AFTER INSERT ON `penjualans`
               FOR EACH ROW BEGIN
                  UPDATE produks set terjual = terjual + NEW.jumlahJual where id = NEW.idProduk;
              END'
        );

        //update stokGudang jika ada pembelian
        DB::unprepared(
            'CREATE TRIGGER `updateStokGudangPembelian` AFTER INSERT ON `pembelians`
               FOR EACH ROW BEGIN
                  UPDATE produks set stokGudang = stokGudang + NEW.jumlahBeli where id = NEW.idProduk;
              END'
        );

        //trigger update stok toko ketika ada pembelian
        DB::unprepared(
            'CREATE TRIGGER `updateStokTokoPembelian` AFTER INSERT ON `pembelians`
               FOR EACH ROW BEGIN
                  UPDATE produks set stokToko = stokToko + NEW.jumlahBeli where id = NEW.idProduk;
              END'
        );

        // Tabel toko2
        //update stok toko ketika ada penjualan
        DB::unprepared(
            'CREATE TRIGGER `updateStokToko2` AFTER INSERT ON `penjualan2s`
               FOR EACH ROW BEGIN
                  UPDATE produk2s set stokToko = stokToko - NEW.jumlahJual where id = NEW.idProduk;
              END'
        );

        //update jumlah terjual jika ada penjualan
        DB::unprepared(
            'CREATE TRIGGER `updateTerjual2` AFTER INSERT ON `penjualan2s`
               FOR EACH ROW BEGIN
                  UPDATE produk2s set terjual = terjual + NEW.jumlahJual where id = NEW.idProduk;
              END'
        );

        //update stokGudang jika ada pembelian
        DB::unprepared(
            'CREATE TRIGGER `updateStokGudangPembelian2` AFTER INSERT ON `pembelian2s`
               FOR EACH ROW BEGIN
                  UPDATE produk2s set stokGudang = stokGudang + NEW.jumlahBeli where id = NEW.idProduk;
              END'
        );

        //trigger update stok toko ketika ada pembelian
        DB::unprepared(
            'CREATE TRIGGER `updateStokTokoPembelian2` AFTER INSERT ON `pembelian2s`
               FOR EACH ROW BEGIN
                  UPDATE produk2s set stokToko = stokToko + NEW.jumlahBeli where id = NEW.idProduk;
              END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER Trigger');
    }
}
