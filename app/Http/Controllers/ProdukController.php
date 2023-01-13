<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategori2;
use App\Models\Produk;
use App\Models\Produk2;
use App\Models\Satuan;
use App\Models\Satuan2;
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
        if (auth()->user()->level == 'toko1') {
            $produk = Produk::where('idUser', auth()->user()->id ?? '')->orderBy('namaProduk', 'asc')->paginate(10)->withQueryString();
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::where('idUser', auth()->user()->id ?? '')->orderBy('namaProduk', 'asc')->paginate(10)->withQueryString();
        }
        return Inertia::render('Produk/Index', [
            'title' => 'Data Produk',
            'products' => $produk ?? 'Anda tidak bisa akses halaman ini -_-',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();

        if (auth()->user()->level == 'toko1') {
            $kategori = Kategori::all();
        } elseif (auth()->user()->level == 'toko2') {
            $kategori = Kategori2::all();
        }

        if (auth()->user()->level == 'toko1') {
            $satuan = Satuan::all();
        } elseif (auth()->user()->level == 'toko2') {
            $satuan = Satuan2::all();
        }

        return Inertia::render('Produk/Create', [
            'title' => 'Tambah Produk',
            'toko' => $toko ?? 'Anda tidak bisa akses halaman ini -_-',
            'kategori' => $kategori ?? 'Anda tidak bisa akses halaman ini -_-',
            'satuan' => $satuan ?? 'Anda tidak bisa akses halaman ini -_-',
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
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();
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
                'barcode.required' => 'Nama Produk harus diisi',
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

        if (auth()->user()->level == 'toko1') {
            Produk::create($data);
        } elseif (auth()->user()->level == 'toko2') {
            Produk2::create($data);
        }

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
            'produk' => $produk ?? 'Anda tidak bisa akses halaman ini -_-',
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
        if (auth()->user()->level == 'toko1') {
            $produk = Produk::where('id', $id)->first();
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::where('id', $id)->first();
        }

        $produk = Toko::where('idUser', auth()->user()->id)->first();
        if (auth()->user()->level == 'toko1') {
            $kategori = Kategori::all();
        } elseif (auth()->user()->level == 'toko2') {
            $kategori = Kategori2::all();
        }

        if (auth()->user()->level == 'toko1') {
            $satuan = Satuan::all();
        } elseif (auth()->user()->level == 'toko2') {
            $satuan = Satuan2::all();
        }

        return Inertia::render('Produk/Edit', [
            'title' => 'Edit produk',
            'produk' => $produk,
            'kategori' => $kategori,
            'satuan' => $satuan,
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
        if (auth()->user()->level == 'toko1') {
            $produk = Produk::where('id', $id)->first();
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::where('id', $id)->first();
        }

        $data = $request->validate(
            [
                'barcode' => 'required',
                'namaProduk' => 'required|min:1',
                'hargaJual' => 'required',
                'hargaBeli' => 'required',
                'idKategori' => 'required',
                'idSatuan' => 'required',
                'stokGudang' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'barcode.required' => 'Nama Produk harus diisi',
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
        if (auth()->user()->level == 'toko1') {
            $produk = Produk::find($id);
            $produk->delete();
            return back()->with('message', 'Berhasil dihapus');
        } elseif (auth()->user()->level == 'toko2') {
            $produk = Produk2::find($id);
            $produk->delete();
            return back()->with('message', 'Berhasil dihapus');
        }
    }
}
