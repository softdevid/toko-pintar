<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian2;
use App\Models\Penjualan;
use App\Models\Penjualan2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LaporanAdminController extends Controller
{
    public function laporanPenjualanBulananAdmin(Request $request)
    {
        $date = Carbon::parse($request->date); //request dari admin dengan variabel name "date"
        $month = $date->format('m');
        $year = $date->format('Y');

        $penjualan1 = Penjualan::whereMonth('tglJual', $month)->whereYear('tglJual', $year)->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan2 = Penjualan2::whereMonth('tglJual', $month)->whereYear('tglJual', $year)->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan = $penjualan1->concat($penjualan2);

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $penjualan->sum('hargaBeli');
        foreach ($penjualan as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanAdmin/LaporanBulanan', [
            'title' => 'Laporan Bulanan semua toko',
            'penjualan' => $penjualan,
            'total' => $total,
            'profit' => $profit,
        ]);
    }

    public function laporanPenjualanTahunanAdmin(Request $request)
    {
        $date = Carbon::parse($request->date); //request dari admin dengan variabel name "date"
        $year = $date->format('Y');

        $penjualan1 = Penjualan::whereYear('tglJual', $year)->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan2 = Penjualan2::whereYear('tglJual', $year)->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan = $penjualan1->concat($penjualan2);

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $penjualan->sum('hargaBeli');
        foreach ($penjualan as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanAdmin/LaporanTahunan', [
            'title' => 'Laporan Bulanan semua toko',
            'penjualan' => $penjualan,
            'total' => $total,
            'profit' => $profit,
        ]);
    }

    public function laporanPenjualanRange(Request $request)
    {
        $tglAwal = Carbon::parse('2023-01-12');
        $first = $tglAwal->format('Y-m-d');

        $tglAkhir = Carbon::parse('2023-01-15');
        $two = $tglAkhir->format('Y-m-d');


        $penjualan1 = Penjualan::whereBetween('tglJual', [$first, $two])->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan2 = Penjualan2::whereBetween('tglJual', [$first, $two])->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        $penjualan = $penjualan1->concat($penjualan2);

        $omset = 0;
        foreach ($penjualan as $value) {
            $omset += $value['hargaJual'] * $value['jumlahJual'];
        }

        return Inertia::render('LaporanAdmin/LaporanRange', [
            'title' => 'Laporan Tahunan penjualan semua toko',
            'penjualan' => $penjualan,
            'omset' => $omset,
        ]);
    }


    //======================================pembelian bulanan, tahunan, range ============================================================================
    public function laporanPembelianBulananAdmin(Request $request)
    {
        $date = Carbon::parse($request->date); //request dari admin dengan variabel name "date"
        $month = $date->format('m');
        $year = $date->format('Y');

        $pembelian1 = Pembelian::whereMonth('tglBeli', $month)->whereYear('tglBeli', $year)->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian2 = Pembelian2::whereMonth('tglBeli', $month)->whereYear('tglBeli', $year)->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian = $pembelian1->concat($pembelian2);

        $totalPengeluaran = 0;
        foreach ($pembelian as $value) {
            $totalPengeluaran += $value['hargaBeli'] * $value['jumlahBeli'];
        }

        return Inertia::render('LaporanAdmin/LaporanBulanan', [
            'title' => 'Laporan Bulanan Pembelian semua toko',
            'pembelian' => $pembelian,
            'totalPengeluaran' => $totalPengeluaran,
        ]);
    }

    public function laporanPembelianTahunanAdmin(Request $request)
    {
        $date = Carbon::parse($request->date); //request dari admin dengan variabel name "date"
        $year = $date->format('Y');

        $pembelian1 = Pembelian::whereYear('tglBeli', $year)->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian2 = Pembelian2::whereYear('tglBeli', $year)->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian = $pembelian1->concat($pembelian2);

        $totalPengeluaran = 0;
        foreach ($pembelian as $value) {
            $totalPengeluaran += $value['hargaBeli'] * $value['jumlahBeli'];
        }

        return Inertia::render('LaporanAdmin/LaporanTahunan', [
            'title' => 'Laporan Tahunan Pembelian semua toko',
            'pembelian' => $pembelian,
            'totalPengeluaran' => $totalPengeluaran,
        ]);
    }



    public function laporanPembelianRange(Request $request)
    {
        $tglAwal = Carbon::parse('2023-01-12');
        $first = $tglAwal->format('Y-m-d');

        $tglAkhir = Carbon::parse('2023-01-15');
        $two = $tglAkhir->format('Y-m-d');


        $pembelian1 = Pembelian::whereBetween('tglBeli', [$first, $two])->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian2 = Pembelian2::whereBetween('tglBeli', [$first, $two])->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        $pembelian = $pembelian1->concat($pembelian2);

        $totalPengeluaran = 0;
        foreach ($pembelian as $value) {
            $totalPengeluaran += $value['hargaBeli'] * $value['jumlahBeli'];
        }

        return Inertia::render('LaporanAdmin/LaporanRange', [
            'title' => 'Laporan Tahunan Pembelian semua toko',
            'pembelian' => $pembelian,
            'totalPengeluaran' => $totalPengeluaran,
        ]);
    }
}
