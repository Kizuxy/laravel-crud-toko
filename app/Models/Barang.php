<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $fillable = ['nama_pembeli','tgl_pembelian','nama_barang','harga_satuan','jumlah_barang'];

    public $timestamps = true;
}
