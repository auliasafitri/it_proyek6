<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tanggal',
        'harga_bayar',
        'harga_kembali',
        'grand_total',
        'total_barang',
    ];
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
}
