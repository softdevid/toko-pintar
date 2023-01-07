<?php

namespace App\Http\Controllers;

use App\Models\CartPembelian;
use App\Models\CartPenjualan;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlahJual' => 'required|min:1',
        ]);

        $toko = Toko::where('idUser', auth()->user()->id)->select('id');
        $produk = Produk::find($request->id);

        DB::beginTransaction();

        try {
            // insert data ke tabel
            DB::table('cart_penjualans')->insert([
                'idUser' => auth()->user()->id,
                'idProduk' => $request->id,
                'idToko' => $toko->id,
                'namaProduk' => $produk->namaProduk,
                'hargaJual' => $produk->hargaJual,
                'hargaBeli' => $produk->hargaBeli,
                'jumlahJual' => $request->jumlahJual,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


        // CartPenjualan::create([
        //     'idUser' => auth()->user()->id,
        //     'idProduk' => $request->id,
        //     'idToko' => $toko->id,
        //     'namaProduk' => $produk->namaProduk,
        //     'hargaJual' => $produk->hargaJual,
        //     'hargaBeli' => $produk->hargaBeli,
        //     'jumlahJual' => $request->jumlahJual,
        // ]);

        return back()->with('message', 'Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartPenjualan  $cartPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(CartPenjualan $cartPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartPenjualan  $cartPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(CartPenjualan $cartPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartPenjualan  $cartPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartPenjualan $cartPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartPenjualan  $cartPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartPenjualan $cartPenjualan)
    {
        //
    }
}
