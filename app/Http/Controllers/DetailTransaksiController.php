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
            $DetailTransaksi = DB::table('transaksi')
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

    public function detail($id_transaksi)
    {
        $struk = DB::table('detail_transaksi')
        ->select('*')
        ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
        ->join('barang','barang.id_barang','=','detail_transaksi.id_barang')
        ->join('kategori','kategori.id_kategori','=','barang.id_kategori')
        // ->groupBy('tgl_transaksi')
        ->where('detail_transaksi.id_transaksi', '=', $id_transaksi)
        ->get();
        $id_tr['id_transaksi']=$id_transaksi;
// dd($struk);exit;
        // $pendaftaran = pendaftaran::where('id_pendaftaran', $id_pendaftaran)->firstOrFail();
        return view('detail_transaksi/view_struk', compact('struk','id_tr'),  ["title" => "Data Struk"]);
    }
    public function cetakStruk($id)
{
    $struk = DB::table('detail_transaksi')
    ->select('*')
    ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
        ->join('barang','barang.id_barang','=','detail_transaksi.id_barang')
        ->join('kategori','kategori.id_kategori','=','barang.id_kategori')
        // ->groupBy('tgl_transaksi')
        ->where('detail_transaksi.id_transaksi', '=', $id)
    ->get();
    $pdf = \PDF::loadView('struk_pdf', compact('struk'));

    return $pdf->stream('struk-transaksi.pdf');
}
public function cetakRekap()
{
    $tanggal_dari = request('tanggal_dari');
$tanggal_sampai = request('tanggal_sampai');

// Mengambil data transaksi dengan filter tanggal
$transaksi = DB::table('detail_transaksi')
    ->select('*')
    ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
    ->join('barang', 'barang.id_barang', '=', 'detail_transaksi.id_barang')
    ->join('kategori', 'kategori.id_kategori', '=', 'barang.id_kategori')
    ->where('transaksi.tanggal', '>=', $tanggal_dari)
    ->where('transaksi.tanggal', '<=', $tanggal_sampai)
    ->get();

// dd($transaksi);



    $pdf = \PDF::loadView('rekap_pdf', compact('transaksi','tanggal_dari','tanggal_sampai'));

    return $pdf->download('rekap-transaksi.pdf');
}

//     public function printPDF(Request $request)
// {

//         $filterDate = Carbon::createFromDate($year, $month, 1)->format('F Y'); // Format: Bulan Tahun (e.g., April 2024)
//     $pdf = \PDF::loadView('absen.pdf_view', compact('absen', 'month', 'year','filterDate','siswa','kelas'));
//     return $pdf->download('absen-'.$month.'-'.$year.'.pdf');
// }

   }
