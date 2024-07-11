<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori_barang;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Barang';
        $data = barang::get();
        return view('barang.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Barang';
        $kategori = kategori_barang::get();
        return view('barang.create', compact('title','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barangs|max:255',
            'id_kategori' => 'required',
        'qty'=> 'required',
        'harga'=> 'required',
        'satuan'=> 'required'
        ]);
        barang::create($request->all());
        return redirect()->route('barang.index');
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
        $title = 'Barang';

        $data = barang::findOrFail($id);
        $kategori = kategori_barang::get();
        return view('barang.edit', compact('title', 'data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang,' . $id . '|max:255',

            'id_kategori' => 'required',
        'qty'=> 'required',
        'harga'=> 'required',
        'satuan'=> 'required'
        ]);

        barang::find($id)->update($request->all());
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            barang::find($id)->delete();
            return redirect()->route('barang.index');
        // Logika untuk menyimpan data

    } catch (\Exception $e) {
        return Redirect::back()->withInput()->withErrors('Gagal menyimpan data.');
    }

   }
}