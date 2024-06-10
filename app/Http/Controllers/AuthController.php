<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use App\Models\Wali;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Database\QueryException;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

// dd($request->all());
    
        // // Mencari user berdasarkan username
        // $user = User::where('username', $request->username)->first();
    
        // // Jika user ada
        // if ($user) {
        //     // Verifikasi Password menggunakan fungsi otentikasi Laravel
        //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //         // Set session
        //         session()->put('username', $user->username);
        //         session()->put('role', $user->role);

    
        //         // Redirect berdasarkan peran (role) user
        //         // return redirect($this->redirectBasedOnRole($user->role));
        //     return redirect('/test');

        //     } else {
        //         // Display error message for incorrect password
        //         return redirect()->back()->withErrors(['password' => 'Password yang Anda masukkan salah']);
        //     }
        // } else {
        //     // Display error message for non-existent username
        //     return redirect()->back()->withErrors(['username' => 'Username tidak terdaftar']);
        // }
        // dd(Auth::attempt($request->only(['username', 'password'])));
        if (Auth::attempt($request->only(['username', 'password']))) {
            // dd('a');
            return redirect($this->redirectBasedOnRole(Auth::user()->role));
        }else{
            return redirect('/')->with('success', 'gagal login');
        }
    }
    
    // Metode untuk menentukan redirect berdasarkan peran (role) user
    private function redirectBasedOnRole($role)
    {
        
        switch ($role) {
            case 'admin':
                
                return 'dashboard';
            case 'staf':
                return 'dashboard';
            default:
                return 'dashboard';
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); // Lakukan logout user

        $request->session()->invalidate(); // Hapus sesi user

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
    public function register()
    {
        return view('auth.register');
    }
    public function prosesRegister(Request $request)
    {
        //
        $request->validate([
            'nik_siswa' => 'required',
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required',
            'saudara_kandung' => 'required',
            'saudara_tiri' => 'required',
            'tinggi' => 'required',
            'berat' => 'required',
            'lingkar_kepala' => 'required',
            'tinggal_dengan' => 'required',
            'jarak' => 'required',
            'kendaraan' => 'required',
            'waktu_tempuh' => 'required',
            'asal_sekolah' => 'required',
            'alamat_siswa' => 'required',
            'email' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'tempat_lahir_ayah' => 'required',
            'tgl_lahir_ayah' => 'required',
            'status_hidup_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'tempat_lahir_ibu' => 'required',
            'tgl_lahir_ibu' => 'required',
            'status_hidup_ibu' => 'required',
        ],[
            'nik_siswa' => 'Wajib Diisi',
            'nisn' => 'Wajib Diisi',
            'nama_lengkap' => 'Wajib Diisi',
            'nama_panggilan' => 'Wajib Diisi',
            'jk' => 'Wajib Diisi',
            'tempat_lahir' => 'Wajib Diisi',
            'tgl_lahir' => 'Wajib Diisi',
            'agama' => 'Wajib Diisi',
            'anak_ke' => 'Wajib Diisi',
            'saudara_kandung' => 'Wajib Diisi',
            'saudara_tiri' => 'Wajib Diisi',
            'tinggi' => 'Wajib Diisi',
            'berat' => 'Wajib Diisi',
            'lingkar_kepala' => 'Wajib Diisi',
            'tinggal_dengan' => 'Wajib Diisi',
            'jarak' => 'Wajib Diisi',
            'kendaraan' => 'Wajib Diisi',
            'waktu_tempuh' => 'Wajib Diisi',
            'asal_sekolah' => 'Wajib Diisi',
            'alamat_siswa' => 'Wajib Diisi',
            'email' => 'Wajib Diisi',
            'nik_ayah' => 'Wajib Diisi',
            'nama_ayah' => 'Wajib Diisi',
            'pekerjaan_ayah' => 'Wajib Diisi',
            'pendidikan_ayah' => 'Wajib Diisi',
            'tempat_lahir_ayah' => 'Wajib Diisi',
            'tgl_lahir_ayah' => 'Wajib Diisi',
            'status_hidup_ayah' => 'Wajib Diisi',
            'nik_ibu' => 'Wajib Diisi',
            'nama_ibu' => 'Wajib Diisi',
            'pekerjaan_ibu' => 'Wajib Diisi',
            'pendidikan_ibu' => 'Wajib Diisi',
            'tempat_lahir_ibu' => 'Wajib Diisi',
            'tgl_lahir_ibu' => 'Wajib Diisi',
            'status_hidup_ibu' => 'Wajib Diisi',
        ]);

        pendaftaran::create([
            'nik' => $request->nik_siswa,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'anak_ke' => $request->anak_ke,
            'saudara_kandung' => $request->saudara_kandung,
            'saudara_tiri' => $request->saudara_tiri,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'lingkar_kepala' => $request->lingkar_kepala,
            'tinggal_dengan' => $request->tinggal_dengan,
            'jarak' => $request->jarak,
            'kendaraan' => $request->kendaraan,
            'waktu_tempuh' => $request->waktu_tempuh,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat_siswa,
            'status'=>'Tunggu',
            'email'=>$request->email
        ]);

        $pendaftaran = Pendaftaran::orderByDesc('id_pendaftaran')->first();
        $id_pendaftaran = $pendaftaran->id_pendaftaran;

        if ($request->status_wali=='Bukan Ortu') {
            wali::create([
                'id_pendaftaran'=>$id_pendaftaran,
                'nik' => $request->nik,
                'nama_wali' => $request->nama_wali,
                'pekerjaan_wali' => $request->pekerjaan_wali,
                'pendidikan_wali' => $request->pendidikan_wali,
                'alamat_wali' => $request->alamat_wali,
                'nik_ayah' => $request->nik_ayah,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
                'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
                'status_hidup_ayah' => $request->status_hidup_ayah,
                'nik_ibu' => $request->nik_ibu,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
                'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
                'status_hidup_ibu' => $request->status_hidup_ibu,
                'tgl_input'=>date('Y-m-d')
            ]);
        }else{
            wali::create([
                'id_pendaftaran'=>$id_pendaftaran,
                'nik' => '-',
                'nama_wali' => '-',
                'pekerjaan_wali' => '-',
                'pendidikan_wali' => '-',
                'alamat_wali' => '-',
                'nik_ayah' => $request->nik_ayah,
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
                'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
                'status_hidup_ayah' => $request->status_hidup_ayah,
                'nik_ibu' => $request->nik_ibu,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
                'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
                'status_hidup_ibu' => $request->status_hidup_ibu,
                'tgl_input'=>date('Y-m-d')
            ]);
        }

        User::create([
            'username' => $request->nisn,
            'password' => Hash::make($request->nisn),
            'email' => $request->email,
            'role' => 'siswa',
        ]);
        
        // exit;
        return redirect()->route('login')->with('success', 'Data pendaftaran berhasil ditambahkan');        // return 'hai';
    }
}
