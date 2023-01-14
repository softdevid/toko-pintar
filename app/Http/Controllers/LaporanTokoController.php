<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian2;
use App\Models\Penjualan;
use App\Models\Penjualan2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class LaporanTokoController extends Controller
{

    //=================================== ini untuk toko laporan bulanan dan tahunan dll =========================================================================================================================================================//
    public function laporanBulananPenjualan(Request $request)
    {
        $date = Carbon::parse($request->date); //request date/bulan
        $month = $date->format('m');
        $year = $date->format('Y');
        // dd($date, $month);

        if (auth()->user()->level == 'toko1') {
            $penjualan = Penjualan::whereMonth('tglJual', $month)
                ->whereYear('tglJual', $year)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $penjualan = Penjualan2::whereMonth('tglJual', $month)
                ->whereYear('tglJual', $year)->get();
        }

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $penjualan->sum('hargaBeli');
        foreach ($penjualan as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanToko/LaporanBulanan', [
            'title' => 'laporan bulanan',
            'profit' => $profit,
            'total' => $total,
            'penjualan' => $penjualan,
        ]);
    }

    public function laporanTahunanPenjualan(Request $request)
    {
        $date = Carbon::parse($request->date); //request date/bulan
        $year = $date->format('Y');
        // dd($date, $month);

        if (auth()->user()->level == 'toko1') {
            $penjualan = Penjualan::whereYear('tglJual', $year)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $penjualan = Penjualan2::whereYear('tglJual', $year)->get();
        }

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $penjualan->sum('hargaBeli');
        foreach ($penjualan as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanToko/LaporanTahunan', [
            'title' => 'Laporan tahunan',
            'profit' => $profit,
            'total' => $total,
            'penjualan' => $penjualan,
        ]);
    }


    public function laporanPenjualanRange(Request $request)
    {
        $tglAwal = Carbon::parse($request->tglAwal);
        $first = $tglAwal->format('Y-m-d');

        $tglAkhir = Carbon::parse($request->tglAkhir);
        $two = $tglAkhir->format('Y-m-d');

        if (auth()->user()->level == 'toko1') {
            $penjualan = Penjualan::whereBetween('tglJual', [$first, $two])->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        } elseif (auth()->user()->level == 'toko2') {
            $penjualan = Penjualan2::whereBetween('tglJual', [$first, $two])->select('noFakturJual', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahJual', 'tglJual')->get();
        }

        $omset = 0;
        $profit = 0;
        foreach ($penjualan as $value) {
            $omset += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $value['hargaBeli'];
        }

        return Inertia::render('LaporanToko/LaporanRange', [
            'title' => 'Laporan Tahunan penjualan semua toko',
            'penjualan' => $penjualan,
            'omset' => $omset,
            'profit' => $profit,
        ]);
    }


    // ==================== end penjualan ===========================


    // ============================== Pembelian ============================================

    public function laporanBulananPembelian(Request $request)
    {
        $date = Carbon::parse($request->date); //request date/bulan
        $month = $date->format('m');
        $year = $date->format('Y');
        // dd($date, $month);

        if (auth()->user()->level == 'toko1') {
            $pembelian = Pembelian::whereMonth('tglBeli', $month)
                ->whereYear('tglBeli', $year)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $pembelian = Pembelian2::whereMonth('tglBeli', $month)
                ->whereYear('tglBeli', $year)->get();
        }

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $pembelian->sum('hargaBeli');
        foreach ($pembelian as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanToko/LaporanBulanan', [
            'title' => 'laporan bulanan',
            'profit' => $profit,
            'total' => $total,
            'pembelian' => $pembelian,
        ]);
    }

    public function laporanTahunanPembelian(Request $request)
    {
        $date = Carbon::parse($request->date); //request date/bulan
        $year = $date->format('Y');
        // dd($date, $month);

        if (auth()->user()->level == 'toko1') {
            $pembelian = Pembelian::whereYear('tglBeli', $year)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $pembelian = Pembelian2::whereYear('tglBeli', $year)->get();
        }

        $total = 0;
        $profit = 0;
        $totalHrgBeli = $pembelian->sum('hargaBeli');
        foreach ($pembelian as $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $profit += ($value['hargaJual'] * $value['jumlahJual']) - $totalHrgBeli;
        }

        return Inertia::render('LaporanToko/LaporanTahunan', [
            'title' => 'Laporan tahunan',
            'profit' => $profit,
            'total' => $total,
            'pembelian' => $pembelian,
        ]);
    }


    public function laporanPembelianRange(Request $request)
    {
        $tglAwal = Carbon::parse($request->tglAwal);
        $first = $tglAwal->format('Y-m-d');

        $tglAkhir = Carbon::parse($request->tglAkhir);
        $two = $tglAkhir->format('Y-m-d');

        if (auth()->user()->level == 'toko1') {
            $pembelian = Pembelian::whereBetween('tglBeli', [$first, $two])->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        } elseif (auth()->user()->level == 'toko2') {
            $pembelian = Pembelian2::whereBetween('tglBeli', [$first, $two])->select('noFakturBeli', 'barcode', 'namaProduk', 'hargaJual', 'hargaBeli', 'jumlahBeli', 'tglBeli')->get();
        }

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


    //======= End toko ==========//
}
