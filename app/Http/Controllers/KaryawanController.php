<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Karyawan2;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 'toko1') {
            $karyawan = Karyawan::where('idUser', auth()->user()->id)->paginate(10)->withQueryString();
        } elseif (auth()->user()->level == 'toko2') {
            $karyawan = Karyawan2::where('idUser', auth()->user()->id)->paginate(10)->withQueryString();
        }

        return Inertia::render('Karyawan/Index', [
            'title' => 'Karyawan',
            'karyawan' => $karyawan,
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
        return Inertia::render('Karyawan/Create', [
            'title' => 'Karyawan',
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
        $request->validate([
            'nama' => 'required',
            'noHp' => 'required',
            'alamat' => 'required',
            'tanggalLahir' => 'required',
            'gaji' => 'required',
        ]);
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();

        if (auth()->user()->level == 'toko1') {
            Karyawan::create([
                'idToko' => $toko->idToko,
                'idUser' => auth()->user()->id,
                'nama' => $request->nama,
                'noHp' => $request->noHp,
                'alamat' => $request->alamat,
                'tanggalLahir' => $request->tanggalLahir,
                'gaji' => $request->gaji,
            ]);
        } elseif (auth()->user()->level == 'toko2') {
            Karyawan2::create([
                'idToko' => $toko->idToko,
                'idUser' => auth()->user()->id,
                'nama' => $request->nama,
                'noHp' => $request->noHp,
                'alamat' => $request->alamat,
                'tanggalLahir' => $request->tanggalLahir,
                'gaji' => $request->gaji,
            ]);
        }

        return back()->with('message', 'Karyawan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan, $id)
    {
        if (auth()->user()->level == 'toko1') {
            $karyawan = Karyawan::find($id);
        } elseif (auth()->user()->level == 'toko2') {
            $karyawan = Karyawan2::find($id);
        }

        return Inertia::render('Karyawan/Show', [
            'title' => 'Detail Karyawan',
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan, $id)
    {
        if (auth()->user()->level == 'toko1') {
            $karyawan = Karyawan::find($id);
        } elseif (auth()->user()->level == 'toko2') {
            $karyawan = Karyawan2::find($id);
        }
        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();

        return Inertia::render('Karyawan/Edit', [
            'title' => 'Edit Karyawan',
            'karyawan' => $karyawan,
            'toko' => $toko,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan, $id)
    {
        if (auth()->user()->level == 'toko1') {
            $karyawan = Karyawan::find($id);
        } elseif (auth()->user()->level == 'toko2') {
            $karyawan = Karyawan2::find($id);
        }

        $toko = Toko::where('idUser', auth()->user()->id)->select('id')->first();
        $karyawan->update([
            'idToko' => $toko->idToko,
            'idUser' => auth()->user()->id,
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'tanggalLahir' => $request->tanggalLahir,
            'gaji' => $request->gaji,
        ]);

        return back()->with('message', 'Karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan, $id)
    {
        if (auth()->user()->level == 'toko1') {
            Karyawan::where('id', $id)->delete();
        } elseif (auth()->user()->level == 'toko2') {
            Karyawan2::where('id', $id)->delete();
        }
        return back()->with('message', 'Berhasil di hapus');
    }
}
