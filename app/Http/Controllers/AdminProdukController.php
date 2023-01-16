<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategori2;
use App\Models\Produk;
use App\Models\Produk2;
use App\Models\Satuan;
use App\Models\Satuan2;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk1 = Produk::get();
        $produk2 = Produk2::get();
        $produk = $produk1->concat($produk2);
        return Inertia::render('AdminProduk/Index', [
            'title' => 'Data produk semua toko',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::all();

        $kategori = Kategori::select('namaKategori', 'id')->get();
        $kategori2 = Kategori2::select('namaKategori', 'id')->get();

        $satuan = Satuan::select('namaSatuan', 'id')->get();
        $satuan2 = Satuan2::select('namaSatuan', 'id')->get();

        return Inertia::render('AdminProduk/Create', [
            'title' => 'Tambah Produk',
            'kategori' => $kategori,
            'kategori2' => $kategori2,
            'satuan' => $satuan,
            'satuan2' => $satuan2,
            'toko' => $toko,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $toko = User::where('id', $request->idUser)->select('level')->first();
        $data = $request->validate(
            [
                'barcode' => 'required',
                'namaProduk' => 'required|min:1',
                'hargaJual' => 'required',
                'hargaBeli' => 'required',
                'idKategori' => 'required',
                'idSatuan' => 'required',
                'stokToko' => 'required',
                'stokGudang' => 'required',
                'deskripsi' => 'required',
                'idUser' => 'required',
                'idToko' => 'required',
            ],
            [
                'barcode.required' => 'Barode Produk harus diisi',
                'namaProduk.required' => 'Nama Produk harus diisi',
                'hargaJual.required' => 'Harga Jual harus diisi',
                'hargaBeli.required' => 'Harga Beli harus diisi',
                'idKategori.required' => 'Kategori harus dipilih',
                'idSatuan.required' => 'Satuan jual harus dipilih',
                'stokToko.required' => 'Stok toko harus diisi',
                'stokGudang.required' => 'Stok toko harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]
        );

        if ($toko->level == 'toko1') {
            Produk::create($data);
        } elseif ($toko->level == 'toko2') {
            Produk2::create($data);
        }

        return back()->with('message', 'Produk berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $toko = User::where('idUser', $request->idUser)->select('level')->first();
        if ($toko->level == 'toko1') {
            $produk = Produk::where('id', $request->id)->first();
        } elseif ($toko->level == 'toko2') {
            $produk = Produk2::where('id', $request->id)->first();
        }

        return Inertia::render('AdminProduk/Show', [
            'title' => 'Detail Produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $toko = User::where('id', $request->idUser)->select('level', 'id')->first();
        if ($toko->level == 'toko1') {
            $produk = Produk::where(['id' => $request->id, 'idToko' => $request->idToko])->first();
        } elseif ($toko->level == 'toko2') {
            $produk = Produk2::where(['id' => $request->id, 'idToko' => $request->idToko])->first();
        }

        return Inertia::render('AdminProduk/Edit', [
            'title' => 'Edit Produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
