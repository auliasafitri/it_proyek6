<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_transaksi',
        'barang_id',
        'jumlah_barang',
        'sub_total',
    ];
    protected $table='detail_transaksi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;

  
}