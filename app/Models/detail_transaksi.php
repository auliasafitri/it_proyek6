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
        'tgl_transaksi',
        'jam_trs',
    ];
    protected $table='detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $keyType = 'string';
    public $timestamps = false;
}
