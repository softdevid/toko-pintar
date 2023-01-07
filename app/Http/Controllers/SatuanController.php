<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Satuan2;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 'toko1') {
            $satuan = Satuan::latest()->paginate(10)->withQueryString();
        } elseif (auth()->user()->level == 'toko2') {
            $satuan = Satuan2::latest()->paginate(10)->withQueryString();
        }

        return Inertia::render('Satuan/Index', [
            'title' => 'Satuan',
            'satuan' => $satuan,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan, $id)
    {
        if (auth()->user()->level == 'toko1') {
            $satuan = Satuan::find($id);
        } elseif (auth()->user()->level == 'toko2') {
            $satuan = Satuan2::find($id);
        }

        $satuan->update([
            'namaSatuan' => $request->namaSatuan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        //
    }
}
