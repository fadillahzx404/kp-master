<?php

namespace App\Http\Controllers;

use App\Models\Merks;
use App\Models\Barangs;
use Illuminate\Http\Request;

class MerksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Merks::all();
        return view('merks.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Merks::create($data);

        return redirect()->route('merks.index')->with('Success', 'Merks telah ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merks $merks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merks $merks, $id)
    {
        $data = Merks::findOrFail($id);
        return view('merks.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merks $merks, $id)
    {
        $data = $request->all();

        $item = Merks::findorFail($id);

        $item->update($data);

        return redirect()->route('merks.index')->with('Success', 'Merk berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merks $merks, $id)
    {
        $item = Merks::findOrFail($id);

        Barangs::where('merk_id', $id)->delete();

        $item->delete();

        return redirect()->route('merks.index')->with('Success', 'Merk telah dihapus !');
    }
}
