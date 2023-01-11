<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategori2;
use App\Models\Toko;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();
        if (auth()->user()->level == 'toko1') {
            $kategori = Kategori::where('idUser', auth()->user()->id)->paginate(10)->withQueryString();
        } elseif (auth()->user()->level == 'toko2') {
            $kategori = Kategori2::where('idUser', auth()->user()->id)->paginate(10)->withQueryString();
        }
        return Inertia::render('Kategori/Index', [
            'title' => 'Kategori',
            'kategori' => $kategori,
            'toko' => $toko,
        ]);
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
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();

        $request->validate([
            'namaKategori' => 'required',
        ]);

        if (auth()->user()->level == 'toko1') {
            Kategori::create([
                'namaKategori' => $request->namaKategori,
                'idUser' => auth()->user()->id,
                'idToko' => $toko->id,
            ]);
        } elseif (auth()->user()->level == 'toko2') {
            Kategori2::create([
                'namaKategori' => $request->namaKategori,
                'idUser' => auth()->user()->id,
                'idToko' => $toko->id,
            ]);
        }

        return back()->with('message', 'Kategori berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();

        $request->validate([
            'namaKategori' => 'required',
        ]);

        if (auth()->user()->level == 'toko1') {
            $kategori = Kategori::find($id);
        } elseif (auth()->user()->level == 'toko2') {
            $kategori = Kategori2::find($id);
        }


        if (auth()->user()->level == 'toko1') {
            $kategori->update([
                'namaKategori' => $request->namaKategori,
                'idUser' => auth()->user()->id,
                'idToko' => $toko->id,
            ]);
        } elseif (auth()->user()->level == 'toko2') {

            $kategori->update([
                'namaKategori' => $request->namaKategori,
                'idUser' => auth()->user()->id,
                'idToko' => $toko->id,
            ]);
        }

        return back()->with('message', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori, $id)
    {
        if (auth()->user()->level == 'toko1') {
            Kategori::where('id', $id)->first()->delete();
            return back()->with('message', 'Kategori berhasil dihapus');
        } elseif (auth()->user()->level == 'toko2') {
            Kategori2::where('id', $id)->first()->delete();
            return back()->with('message', 'Kategori berhasil dihapus');
        }
    }
}
