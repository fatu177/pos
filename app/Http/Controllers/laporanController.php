<?php

namespace App\Http\Controllers;

use App\Models\detail_penjualan;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function index()
    {
        $detail_penjualan = detail_penjualan::get();
        return view('laporan', compact('detail_penjualan'));
    }
}