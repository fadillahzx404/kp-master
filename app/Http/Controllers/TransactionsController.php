<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Merks;
use App\Models\Barangs;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Transactions::all();
        if ($request->filled('end')) {
            $data = Transactions::whereBetween('tanggal', [$request->start, $request->end])
                ->get()
                ->all();
        }

        if ($request->tipe_transaksi == 'Masuk') {
            $data = Transactions::where('status', 'Masuk')->get()->all();
        } elseif ($request->tipe_transaksi == 'Keluar') {
            $data = Transactions::where('status', 'Keluar')->get()->all();
        }

        return view('transactions.index', ['datas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merks = Merks::all();
        $barangs = Barangs::all();
        return view('transactions.create', ['merks' => $merks, 'barangs' => $barangs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $items = Transactions::create($data);

        $barangs = Barangs::findOrFail($items->barang_id);
        if ($items->status == 'Masuk') {
            $stock_masuk = $barangs->stock + $items->jumlah;
            $barangs->update(['stock' => $stock_masuk]);
        } elseif ($items->status == 'Keluar') {
            $stock_keluar = $barangs->stock - $items->jumlah;
            $barangs->update(['stock' => $stock_keluar]);
        }

        return redirect()->route('transactions.index')->with('Success', 'Transaksi telah ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions, $id)
    {
        $items = Transactions::findOrFail($id);

        $barangs = Barangs::findOrFail($items->barang_id);

        if ($items->status == 'Masuk') {
            $stock_masuk = $barangs->stock - $items->jumlah;
            $barangs->update(['stock' => $stock_masuk]);
        } elseif ($items->status == 'Keluar') {
            $stock_keluar = $barangs->stock + $items->jumlah;
            $barangs->update(['stock' => $stock_keluar]);
        }

        $items->delete();

        return redirect()->route('transactions.index')->with('Success', 'Transaksi telah dihapus !');
    }
}
