<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::where('idUser', auth()->user()->id)->paginate(10)->withQueryString();
        return Inertia::render('Member/Index', [
            'title' => 'Member',
            'member' => $member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Member/Create', [
            'title' => 'Tambah Member',
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
        $toko = Toko::where('idUser', auth()->user()->id)->select('id');
        $request->validate([
            'namaMember' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noHp' => 'required',
            'alamat' => 'required',
            'tanggalLahir' => 'required',
        ]);
        Member::create([
            'idUser' => auth()->user()->id,
            'idToko' => $toko->id,
            'namaMember' => $request->namaMember,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'tanggalLahir' => $request->tanggalLahir,
        ]);

        User::create([
            'name' => $request->namaMember,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('message', 'Member Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member, $id)
    {
        $member = Member::find($id);
        return Inertia::render('Member/Show', [
            'title' => "Detail member $member->namaMember",
            'member' => $member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member, $id)
    {
        $member = Member::find($id);
        return Inertia::render('Member/Edit', [
            'title' => 'Edit member',
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member, $id)
    {
        $toko = Toko::where('idUser', auth()->user()->id)->select('id');
        $request->validate([
            'namaMember' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
            'noHp' => 'required',
            'alamat' => 'required',
            'tanggalLahir' => 'required',
        ]);

        Member::where('id', $id)->update([
            'idUser' => auth()->user()->id,
            'idToko' => $toko->id,
            'namaMember' => $request->namaMember,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'tanggalLahir' => $request->tanggalLahir,
        ]);

        User::create([
            'name' => $request->namaMember,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('message', 'Member Berhasil di tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member, $id)
    {
        Member::where('id', $id)->delete();
        return back()->with('message', 'Member berhasil di Hapus');
    }
}
