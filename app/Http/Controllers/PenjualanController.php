<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\detail_penjualan;
use App\Models\level;
use App\Models\penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Transaksi';

        $data = penjualan::get();
        return view('transaksi.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Transaksi';
        $max = penjualan::select('id')->max('id');
        $kasir = Level::where('nama_level', 'Kasir')->first();
        $user = User::get()->where('id_level',$kasir->id);
        $barang = barang::get();



        return view('transaksi.create', compact('title','max','user','barang','kasir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'kode_transaksi' => 'required|unique:penjualans,kode_transaksi',
            'tanggal_transaksi' => 'required',
            'id_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'total_harga' => 'required',
            'nominal_bayar' => 'required',
            'kembalian' => 'required',
        ]);
        penjualan::create([
            'nama_transaksi' => $request->nama_transaksi,
            'id_user' => $request->id_user,
            'kode_transaksi' => $request->kode_transaksi,
            'total_harga' => $request->total_harga,
            'nominal_bayar' => $request->nominal_bayar,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);
        $max = penjualan::select('id')->max('id');
        detail_penjualan::create([
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'kembalian' => $request->kembalian,
            'id_penjualan' => $max,
        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Transaksi';
        $data = penjualan::findOrFail($id);
        $kasir = Level::where('nama_level', 'Kasir')->first();
        $user = User::get()->where('id_level',$kasir->id);
        $barang = barang::get();
        $detail_penjualan = detail_penjualan::where('id_penjualan', $id)->first();
<<<<<<< HEAD
=======



>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
        return view('transaksi.edit', compact('title', 'data','user','barang','kasir','detail_penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_user' => 'required',
            'kode_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'id_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'total_harga' => 'required',
            'nominal_bayar' => 'required',
            'kembalian' => 'required',
        ]);
        penjualan::find($id)->update([
            'nama_transaksi' => $request->nama_transaksi,
            'id_user' => $request->id_user,
            'kode_transaksi' => $request->kode_transaksi,
            'kembalian' => $request->kembalian,

            'nominal_bayar' => $request->nominal_bayar,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);
        $detail_penjualan = detail_penjualan::where('id_penjualan', $id)->first();
        detail_penjualan::find($detail_penjualan->id)->update([
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total_harga' => $request->total_harga,

        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        // Logika untuk menyimpan data
        penjualan::find($id)->delete();
        return redirect()->route('transaksi.index');

    } catch (\Exception $e) {
        return Redirect::back()->withInput()->withErrors('Gagal menyimpan data.');
    }
    }
}