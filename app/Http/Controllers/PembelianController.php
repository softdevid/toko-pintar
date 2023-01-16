<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian2;
use App\Models\Produk;
use App\Models\Produk2;
use App\Models\RinciPembelian;
use App\Models\RinciPembelian2;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian(Request $request)
    {
        if (auth()->user()->level == 'toko1') {
            $no = RinciPembelian::count() - 1;
        } elseif (auth()->user()->level == 'toko2') {
            $no = RinciPembelian2::count() - 1;
        }
        $noFaktur = "F-B" . date('Ymd') . $no;

        if (auth()->user()->level == 'toko1') {
            $produk = Produk::find($request->id);
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::find($request->id);
        }

        $request->validate([
            'jumlahBeli' => 'required',
        ]);

        if (auth()->user()->level == 'toko1') {
            Pembelian::create([
                'noFaktur' => $noFaktur,
                'idToko' => $produk->idToko,
                'idProduk' => $produk->idProduk,
                'namaProduk' => $$produk->namaProduk,
                'hargaBeli' => $produk->hargaBeli,
                'hargaBeli' => $produk->hargaBeli,
                'jumlahBeli' => $request->jumlahBeli,
                'tglBeli' => $date,
            ]);
        } elseif (auth()->user()->level == 'toko2') {
            Pembelian2::create([
                'noFaktur' => $noFaktur,
                'idToko' => $produk->idToko,
                'idProduk' => $$produk->idProduk,
                'namaProduk' => $$produk->namaProduk,
                'hargaBeli' => $$produk->hargaBeli,
                'hargaBeli' => $$produk->hargaBeli,
                'jumlahBeli' => $request->jumlahBeli,
                'tglBeli' => $date,
            ]);
        }

        return back()->with('message', 'Berhasil');
    }

    public function rinciPembelian()
    {
        if (auth()->user()->level == 'toko1') {
            $no = RinciPembelian::count() - 1;
        } elseif (auth()->user()->level == 'toko2') {
            $no = RinciPembelian2::count() - 1;
        }
        $noFaktur = "F-J" . date('Ymd') . $no;

        if (auth()->user()->level == 'toko1') {
            $pembelian = Pembelian::where('noFakturBeli', $noFaktur)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $pembelian = Pembelian2::where('noFakturBeli', $noFaktur)->get();
        }

        $firstData = $pembelian->first();

        $total = 0;
        $totalItem = 0;

        foreach ($pembelian as $key => $value) {
            $total += $value['hargaBeli'] * $value['jumlahBeli'];
            $totalItem += $value['jumlahBeli'];
        }

        $data = [
            'noFakturJual' => $firstData->noFakturJual,
            'idToko' => $firstData->idToko,
            'total' => $total,
            'totalItem' => $totalItem,
            'tglBeli' => $firstData->tglBeli,
        ];

        if (auth()->user()->level == 'toko1') {
            RinciPembelian::create($data);
        } elseif (auth()->user()->level == 'toko2') {
            RinciPembelian2::create($data);
        }

        // return redirect()->to('/')->with('message', 'Berhasil disimpan');
        return back()->with('message', 'Transaksi berhasil disimpan');
    }
}
