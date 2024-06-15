<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\AntarmukaController;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('welcome');
});
Route::get('/', [AntarmukaController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/DetailTransaksi/{id}/detail', [DetailTransaksiController::class,'detail'])->name('DetailTransaksi.detail');
Route::resource('/DetailTransaksi', DetailTransaksiController::class);
Route::get('/Kategori/{id}/kategori', [KategoriController::class,'kategori'])->name('Kategori.kategori');
Route::resource('/kategori', KategoriController::class);

//Barang
Route::get('/barangs', [BarangController::class, 'index'])->name('barang.index');

Route::get('/createBarang', [BarangController::class, 'create'])->name('barang.create');
Route::post('/storeBarang', [BarangController::class, 'store'])->name('barang.store');

Route::get('/editBarang/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/updateBarang/{id_barang}', [BarangController::class, 'update'])->name('barang.update');

Route::delete('/deleteBarang/{id_barang}', [BarangController::class, 'delete'])->name('barang.delete');

 
// Route::get('/cetak-struk', 'DetailTransaksiController')->name('cetak.struk');

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
