<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Lokasi;
use App\Models\KelolaBarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AntarmukaController extends Controller
{
 
    public function index()
    {
        //Login View
        dd('a');
        return view('auth.login');
    }

    public function adminDashboard()
    {
        //dashboard view admin
        
        $data['title'] = 'Dashboard';
        $kategori = DB::table('kategori')
            // ->where('jenis_kelola', '=', 'Masuk',)
            ->count();

        $barang = DB::table('barang')
            // ->where('jenis_kelola', '=', 'Rusak',)
            ->count();

        $stok = DB::table('stok')
            ->count();

        $akun = DB::table('akun')
            // ->where('baca', '=', '0',)
            ->count();

        return view('dashboard.admin',compact('kategori','barang','stok','akun'), $data);
    }

    public function stafDashboard()
    {
        //dashboard view staf
        $data['title'] = 'Dashboard';
        return view('dashboard.staf', $data);
    }

    public function kepalaItDashboard()
    {
        //dashboard view kep_it
        $data['title'] = 'Dashboard';
        return view('dashboard.kep_it', $data);
    }

    public function pegawaiView()
    {
        //View Pegawai
        $data = Pegawai::all();
        return view('pegawai.view_pegawai', compact('data'), ["title" => "Data Pegawai"]);
    }

    public function stokBarang()
    {
        //
        $data = Barang::all();
        return view('barang.semua_barang', compact('data'), ["title" => "Data Pegawai"]);
    }

    public function destroy($id)
    {
        //
    }
}
