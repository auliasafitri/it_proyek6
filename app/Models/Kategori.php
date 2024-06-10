<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];

    protected $table='kategori';
    protected $primaryKey = 'id_kategori';
    protected $keyType = 'string';
    public $timestamps = false;
}