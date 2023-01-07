<?php

namespace App\Http\Controllers;

use App\Models\CartPembelian;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class CartPembelianController extends Controller
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
            'jumlahBeli' => 'required|min:1',
        ]);

        $toko = Toko::where('idUser', auth()->user()->id)->select('id');
        $produk = Produk::find($request->id);

        CartPembelian::create([
            'idUser' => auth()->user()->id,
            'idProduk' => $request->id,
            'idToko' => $toko->id,
            'namaProduk' => $produk->namaProduk,
            'hargaJual' => $produk->hargaJual,
            'hargaBeli' => $produk->hargaBeli,
            'jumlahBeli' => $request->jumlahBeli,
        ]);
        return back()->with('message', 'Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartPembelian  $cartPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(CartPembelian $cartPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartPembelian  $cartPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(CartPembelian $cartPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartPembelian  $cartPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartPembelian $cartPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartPembelian  $cartPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartPembelian $cartPembelian)
    {
        //
    }
}
