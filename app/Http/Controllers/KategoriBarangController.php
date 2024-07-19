<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kategori Barang';
        $data = kategori_barang::get();
        return view('kategori_barang.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Kategori Barang';
        return view('kategori_barang.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barangs|max:255',
        ]);
        kategori_barang::create($request->all());
        return redirect()->route('KategoriBarang.index');
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
        $title = 'Kategori Barang';
        $data = kategori_barang::findOrFail($id);
        return view('kategori_barang.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barangs,nama_kategori,' . $id . '|max:255',
        ]);

        kategori_barang::find($id)->update($request->all());
        return redirect()->route('KategoriBarang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        // Logika untuk menyimpan data
        kategori_barang::find($id)->delete();
        return redirect()->route('KategoriBarang.index');
    } catch (\Exception $e) {
        return Redirect::back()->withInput()->withErrors('Gagal menyimpan data.');
    }
    }

}