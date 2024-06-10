<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
   
        //     $id=Auth::user()->id;
            $DetailTransaksi = DB::table('detail_transaksi')
            ->get();
       
        
        return view('detail_transaksi.view_detail_trs', compact('DetailTransaksi'), ["title" => "Data Detail Transaksi"]);
        
    }
   
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas' => 'required',
        ],[
            'kelas.required' => 'Wajib Diisi',
        ]);

        Kelas::create([
            'kelas' => $request->kelas,
        ]);
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan');        // return 'hai';
    }

    public function edit($id_kelas)
    {
       
        $kelas = Kelas::where('id_kelas', $id_kelas)->firstOrFail();
        return view('kelas.view_ubah_kelas', compact('kelas'),  ["title" => "Ubah kelas"]);
    }

    public function update(Request $request, $id_kelas)
    {
        // Validasi input
        $request->validate([
            'kelas' => 'required',
        ]);

        // Temukan lokasi berdasarkan kode lokasi
        $lokasi = Kelas::where('id_kelas', $id_kelas)->firstOrFail();

        // Update data lokasi
        $lokasi->update([
            'kelas' => $request->kelas,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diupdate');
    }
    public function destroy($id_kelas)
    {
        try {
            // Temukan lokasi berdasarkan kode lokasi
            $lokasi = Kelas::where('id_kelas', $id_kelas)->first();
    
            // Hapus data lokasi jika ditemukan
            if ($lokasi) {
                $lokasi->delete();
                return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
            }
    
            // Redirect dengan notifikasi gagal jika lokasi tidak ditemukan
            return redirect()->route('kelas.index')->with('error', 'Data kelas tidak ditemukan');
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan untuk debugging
            return redirect()->route('kelas.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function detail($tgl_transaksi)
    {
        $struk = DB::table('detail_transaksi')
        ->select('*')
        ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
        ->join('barang','barang.id_barang','=','transaksi.id_barang')
        ->join('kategori','kategori.id_kategori','=','barang.id_kategori')
        ->where('tgl_transaksi', '=', $tgl_transaksi)
        ->get();
// dd($struk);exit;
        // $pendaftaran = pendaftaran::where('id_pendaftaran', $id_pendaftaran)->firstOrFail();
        return view('detail_transaksi/view_struk', compact('struk'),  ["title" => "Data Struk"]);
    }

   }
