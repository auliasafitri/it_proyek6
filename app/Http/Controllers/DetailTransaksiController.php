<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

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
       
        
        return view('detail_transaksi.view_detail_trs', compact('DetailTransaksi'), ["title" => "Detail Transaksi"]);
        
    }

    public function destroy($id_kelas)
    {
        try {
            // Temukan lokasi berdasarkan kode lokasi
            $lokasi = Kelas::where('id_kelas', $id_kelas)->first();
    
            // Hapus data lokasi jika ditemukan
            if ($lokasi) {
                $lokasi->delete();
                return redirect()->route('kelas.index')->with('success', 'Detail Transaksi berhasil dihapus');
            }
    
            // Redirect dengan notifikasi gagal jika lokasi tidak ditemukan
            return redirect()->route('kelas.index')->with('error', 'Detail Transaksi tidak ditemukan');
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
    public function printPDF(Request $request)
{

        $filterDate = Carbon::createFromDate($year, $month, 1)->format('F Y'); // Format: Bulan Tahun (e.g., April 2024)
    $pdf = \PDF::loadView('absen.pdf_view', compact('absen', 'month', 'year','filterDate','siswa','kelas'));
    return $pdf->download('absen-'.$month.'-'.$year.'.pdf');
}

   }
