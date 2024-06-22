<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_detail',
        'id_transaksi',
        'id_barang',
        'jumlah_barang',
        'sub_total',
    ];
    protected $table='detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $keyType = 'string';
    public $timestamps = false;

  
}