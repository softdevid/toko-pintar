<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Penjualan2;
use App\Models\Produk;
use App\Models\Produk2;
use App\Models\RinciPenjualan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KasirController extends Controller
{
    public function index()
    {
        $noFaktur = "F-J" . date('Ymd') . RinciPenjualan::count() + 1;
        $penjualan = RinciPenjualan::where('noFaktur', $noFaktur)->get();

        if (auth()->user()->level == 'toko1') {
            $allProduk = Produk::select('id', 'namaProduk', 'hargaJual', 'hargaBeli')->get();
        } elseif (auth()->user()->level == 'toko2') {
            $allProduk = Produk2::select('id', 'namaProduk', 'hargaJual', 'hargaBeli')->get();
        }

        return Inertia::render('Kasir/Utama', [
            'title' => 'Halaman Utama',
            'penjualan' => $penjualan,
            'allProduk' => $allProduk,
        ]);
    }

    public function penjualan(Request $request)
    {
        $noFaktur = "F-J" . date('Ymd') . RinciPenjualan::count() + 1;
        $penjualan = RinciPenjualan::where('noFaktur', $noFaktur)->get();

        if (auth()->user()->level == 'toko1') {
            $produk = Produk::find($request->id);
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::find($request->id);
        }

        $request->validate([
            'jumlahJual' => 'required',
        ]);

        if (auth()->user()->level == 'toko1') {
            Penjualan::create([
                'noFaktur' => $noFaktur,
                'idToko' => $produk->idToko,
                'idProduk' => $produk->idProduk,
                'namaProduk' => $$produk->namaProduk,
                'hargaJual' => $produk->hargaJual,
                'hargaBeli' => $produk->hargaBeli,
                'jumlahJual' => $request->jumlahJual,
            ]);
        } elseif (auth()->user()->level == 'toko2') {
            Penjualan2::create([
                'noFaktur' => $noFaktur,
                'idToko' => $produk->idToko,
                'idProduk' => $$produk->idProduk,
                'namaProduk' => $$produk->namaProduk,
                'hargaJual' => $$produk->hargaJual,
                'hargaBeli' => $$produk->hargaBeli,
                'jumlahJual' => $request->jumlahJual,
            ]);
        }

        return back()->with('message', 'Berhasil');
    }
}
