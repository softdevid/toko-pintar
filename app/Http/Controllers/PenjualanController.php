<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Penjualan2;
use App\Models\Produk;
use App\Models\Produk2;
use App\Models\RinciPenjualan;
use App\Models\RinciPenjualan2;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
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
                'noFakturJual' => $noFaktur,
                'idToko' => $produk->idToko,
                'idProduk' => $produk->idProduk,
                'namaProduk' => $$produk->namaProduk,
                'hargaJual' => $produk->hargaJual,
                'hargaBeli' => $produk->hargaBeli,
                'jumlahJual' => $request->jumlahJual,
                'tglJual' => $date,
            ]);
        } elseif (auth()->user()->level == 'toko2') {
            Penjualan2::create([
                'noFakturJual' => $noFaktur,
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

    public function rinciPenjualan()
    {
        $no = RinciPenjualan::count() - 1;
        $noFaktur = "F-J" . date('Ymd') . $no;

        if (auth()->user()->level == 'toko1') {
            $penjualan = Penjualan::where('noFakturJual', $noFaktur)->get();
        } elseif (auth()->user()->level == 'toko2') {
            $penjualan = Penjualan2::where('noFakturJual', $noFaktur)->get();
        }

        // $object = json_decode(json_encode($penjualan), true);
        // dd($object['noFakturJual']);
        $firstData = $penjualan->first();
        // echo $data->noFakturJual;
        // dd($data);

        // masih error
        $total = 0;
        $totalItem = 0;

        foreach ($penjualan as $key => $value) {
            $total += $value['hargaJual'] * $value['jumlahJual'];
            $totalItem += $value['jumlahJual'];
        }
        // dd($noFakturJual);
        // dd($noFakturJual, $total, $totalItem, $idToko, $tglJual);

        $data = [
            'noFakturJual' => $firstData->noFakturJual,
            'idToko' => $firstData->idToko,
            'total' => $total,
            'totalItem' => $totalItem,
            'tglJual' => $firstData->tglJual,
        ];

        if (auth()->user()->level == 'toko1') {
            RinciPenjualan::create($data);
        } elseif (auth()->user()->level == 'toko2') {
            RinciPenjualan2::create($data);
        }

        // return redirect()->to('/')->with('message', 'Berhasil disimpan');
        return back()->with('message', 'Transaksi berhasil disimpan');
    }
}
