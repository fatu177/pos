<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_penjualan',
        'id_barang',
    
        'qty',
        'harga',

        'kembalian',
    ];
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan', 'id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}