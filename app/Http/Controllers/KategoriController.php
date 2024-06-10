<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')
        ->get();
 
        // $data = lokasi::all();
        return view('kategori.view_kategori', compact('kategori'), ["title" => "Data kategori"]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = DB::table('kategori')
        ->get();
        return view('kategori.view_tambah_kategori', compact('kategori'), ["title" => "Tambah kategori"]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $id=Auth::user()->id;
        // // dd($id);exit;
        // // dd($id);exit;

        // $cek = Pegawai::where('id_user', $id)->first();
        // $kode_lokasi=$cek->kode_lokasi;
        
        $request->validate([
            'nama_kategori' => 'required',
        ],[
            
            'nama_kategori.required' => 'Wajib Diisi',
        ]);

        kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori = Kategori::where('id_kategori', $id_kategori)->firstOrFail();
        return view('kategori.view_ubah_kategori', compact('kategori'),  ["title" => "Ubah kategori"]);
    }
    
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
    
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil diperbarui');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        try {
            // Temukan Pegawai berdasarkan kode pegawai
            $kategori = kategori::where('id_kategori', $id_kategori)->first();
    
            // Hapus data Pegawai jika ditemukan
            if ($kategori) {
                $kategori->delete();
                return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus');
            }
    
            // Redirect dengan notifikasi gagal jika Pegawai tidak ditemukan
            return redirect()->route('kategori.index')->with('error', 'Data kategori tidak ditemukan');
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan untuk debugging
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
