<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'qty',
        'harga',
        'id_kategori',
        'satuan'
    ];
    public function kategori_barang()
    {
        return $this->belongsTo(kategori_barang::class, 'id_kategori','id');
    }
}