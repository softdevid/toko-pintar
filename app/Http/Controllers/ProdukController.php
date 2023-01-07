<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::where('idUser', auth()->user()->id ?? '')->orderBy('namaProduk' . 'asc')->paginate(10)->withQueryString();
        return Inertia::render('Produk/Index', [
            'title' => 'Data Produk',
            'products' => $produk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::where('idUser', auth()->user()->id ?? '')->select('id');
        return Inertia::render('Produk/Create', [
            'title' => 'Tambah Produk',
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
        $data = $request->validate(
            [
                'namaProduk' => 'required|min:1',
                'hargaJual' => 'required',
                'hargaBeli' => 'required',
                'idKategori' => 'required',
                'idSatuan' => 'required',
                'stokToko' => 'required',
                'stokGudang' => 'required',
                'namaGambar' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'namaProduk.required' => 'Nama Produk harus diisi',
                'hargaJual.required' => 'Harga Jual harus diisi',
                'hargaBeli.required' => 'Harga Beli harus diisi',
                'idKategori.required' => 'Kategori harus dipilih',
                'idSatuan.required' => 'Satuan jual harus dipilih',
                'stokToko.required' => 'Stok toko harus diisi',
                'stokGudang.required' => 'Stok toko harus diisi',
                'namaGambar.required' => 'Harus mengupload gambar',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]
        );
        Produk::create($data);
        return back()->with('message', 'Produk berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk, $id)
    {
        $produk = Produk::where('id', $id)->first();
        return Inertia::render('Produk/Show', [
            'title' => 'Detail produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk, $id)
    {
        $produk = Produk::where('id', $id)->first();
        return Inertia::render('Produk/Edit', [
            'title' => 'Edit produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $data = $request->validate(
            [
                'namaProduk' => 'required|min:1',
                'hargaJual' => 'required',
                'hargaBeli' => 'required',
                'idKategori' => 'required',
                'idSatuan' => 'required',
                'stokGudang' => 'required',
                'namaGambar' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'namaProduk.required' => 'Nama Produk harus diisi',
                'hargaJual.required' => 'Harga Jual harus diisi',
                'hargaBeli.required' => 'Harga Beli harus diisi',
                'idKategori.required' => 'Kategori harus dipilih',
                'idSatuan.required' => 'Satuan jual harus dipilih',
                'stokToko.required' => 'Stok toko harus diisi',
                'stokGudang.required' => 'Stok toko harus diisi',
                'namaGambar.required' => 'Harus mengupload gambar',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]
        );
        $produk->update($data);
        return back()->with('message', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, $id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return back()->with('message', 'Berhasil dihapus');
    }
}
