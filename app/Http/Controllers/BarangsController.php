<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use App\Models\Transactions;
use App\Models\Merks;
use Illuminate\Http\Request;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Barangs::with('transactionss')->get()->all();
        return view('barangs.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merks = Merks::all();
        return view('barangs.create', ['merks' => $merks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $barangs_ada = Barangs::where('nama_barang', $data['nama_barang'])
            ->get()
            ->first();

        if ($barangs_ada !== null) {
            return redirect()->route('barangs.create')->withInput($request->input())->with('error', 'Nama barang sudah ada di database, ganti nama lain !!');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('/images/photo', 'public');
        }

        Barangs::create($data);

        return redirect()->route('barangs.index')->with('Success', 'Barangs telah ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangs $barangs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barangs $barangs, $id)
    {
        $data = Barangs::findOrFail($id);
        $merkss = Merks::all();
        return view('barangs.edit', ['data' => $data, 'merkss' => $merkss]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barangs $barangs, $id)
    {
        $data = $request->all();

        $item = Barangs::findorFail($id);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('/images/photo', 'public');
        }

        $item->update($data);

        return redirect()->route('barangs.index')->with('Success', 'Barang berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangs $barangs, $id)
    {
        $item = Barangs::findOrFail($id);

        Transactions::where('barang_id', $id)->delete();

        $item->delete();

        return redirect()->route('barangs.index')->with('Success', 'Barang telah dihapus !');
    }
}
